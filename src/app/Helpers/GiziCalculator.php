<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\KategoriUsia;

class GiziCalculator
{
    private const WEIGHT_MEDIAN = [
        'L' => [0=>3.3, 6=>7.9, 12=>9.6, 18=>10.9, 24=>12.2, 30=>13.3, 36=>14.3, 42=>15.3, 48=>16.3, 54=>17.3, 60=>18.3],
        'P' => [0=>3.2, 6=>7.3, 12=>8.9, 18=>10.2, 24=>11.5, 30=>12.7, 36=>13.9, 42=>15.0, 48=>16.1, 54=>17.2, 60=>18.2],
    ];

    private const HEIGHT_MEDIAN = [
        'L' => [0=>49.9, 6=>67.6, 12=>75.7, 18=>82.3, 24=>87.1, 30=>91.9, 36=>96.1, 42=>99.9, 48=>103.3, 54=>106.7, 60=>110.0],
        'P' => [0=>49.1, 6=>65.7, 12=>74.0, 18=>80.7, 24=>85.7, 30=>90.7, 36=>95.1, 42=>99.0, 48=>102.7, 54=>106.2, 60=>109.4],
    ];

    private const SD_WEIGHT_FACTOR = 0.13;
    private const SD_HEIGHT_FACTOR = 0.035;

    public static function analisis(string $tanggalLahir, float $bb, float $tb, string $jenisKelamin): array
    {
        $lahir = Carbon::parse($tanggalLahir);
        $sekarang = Carbon::now();

        // ⭐ FIX: bulatkan ke bawah supaya jadi bilangan bulat penuh
        // (Carbon versi baru mengembalikan pecahan presisi, bukan int)
        $usiaBulan = (int) floor($lahir->diffInMonths($sekarang));
        $usiaBulan = max(0, $usiaBulan);

        $usiaTahun = intdiv($usiaBulan, 12);
        $sisaBulan = $usiaBulan % 12;

        // ⭐ FIX: cari kategori berdasarkan RENTANG USIA di database,
        // bukan berdasarkan slug yang di-hardcode.
        // Jadi berapa pun kategori yang kamu buat/ubah di admin panel,
        // otomatis cocok tanpa perlu ubah kode.
        $kategori = KategoriUsia::where('usia_min_bulan', '<=', $usiaBulan)
            ->where('usia_max_bulan', '>=', $usiaBulan)
            ->orderBy('usia_min_bulan')
            ->first();

        // Kalau tidak ketemu kategori persis, ambil kategori dengan
        // usia_min_bulan terdekat di bawahnya (fallback, jaga-jaga data bolong)
        if (!$kategori) {
            $kategori = KategoriUsia::where('usia_min_bulan', '<=', $usiaBulan)
                ->orderByDesc('usia_min_bulan')
                ->first();
        }

        // Deteksi kelompok ASI eksklusif: kategori dengan usia_max_bulan < 6
        $asiOnly = $kategori && $kategori->usia_max_bulan < 6;

        $zBerat  = self::hitungZScore($usiaBulan, $bb, $jenisKelamin, 'berat');
        $zTinggi = self::hitungZScore($usiaBulan, $tb, $jenisKelamin, 'tinggi');

        $statusGizi   = self::getStatusGiziDariZ($zBerat);
        $statusTinggi = self::getStatusTinggiDariZ($zTinggi);

        $kebutuhan = [
            'energi'      => $kategori?->kalori_harian ?? 0,
            'protein'     => $kategori?->protein_harian ?? 0,
            'lemak'       => $kategori?->lemak_harian ?? 0,
            'karbohidrat' => $kategori?->karbohidrat_harian ?? 0,
            'serat'       => $kategori?->serat_harian ?? 0,
            'air'         => $kategori?->air_harian ?? 0,
        ];

        $bbIdeal = self::interpolasi(self::WEIGHT_MEDIAN[$jenisKelamin], $usiaBulan);
        $tbIdeal = self::interpolasi(self::HEIGHT_MEDIAN[$jenisKelamin], $usiaBulan);

        $pesanStatus = self::getPesanStatus($statusGizi);
        $saranUmum   = self::getSaranUmum($statusGizi, $usiaBulan);
        $labelStatus = self::getLabelStatus($statusGizi, $statusTinggi);

        return [
            'usia_bulan' => $usiaBulan,
            'usia_tahun' => $usiaTahun,
            'sisa_bulan' => $sisaBulan,

            // ⭐ Info kategori sekarang dikembalikan langsung dari sini,
            // supaya Livewire tidak perlu query ulang dengan cara berbeda
            'kategori_usia_id' => $kategori?->id,
            'kategori' => $kategori?->nama ?? 'Tidak diketahui',
            'asi_only' => $asiOnly,

            'status_gizi' => $statusGizi,
            'status_tinggi' => $statusTinggi,
            'z_score_bb_u' => round($zBerat, 2),
            'z_score_tb_u' => round($zTinggi, 2),
            'label_status' => $labelStatus,
            'bb_ideal' => round($bbIdeal, 1),
            'tb_ideal' => round($tbIdeal, 1),
            'kebutuhan_kalori' => $kebutuhan['energi'],
            'kebutuhan_protein' => $kebutuhan['protein'],
            'kebutuhan_lemak' => $kebutuhan['lemak'],
            'kebutuhan_karbohidrat' => $kebutuhan['karbohidrat'],
            'kebutuhan_serat' => $kebutuhan['serat'],
            'kebutuhan_air' => $kebutuhan['air'],
            'pesan_status' => $pesanStatus,
            'saran_umum' => $saranUmum,
        ];
    }

    private static function interpolasi(array $tabel, int $usiaBulan): float
    {
        $usiaBulan = max(0, min(60, $usiaBulan));
        $keys = array_keys($tabel);
        sort($keys);

        $bawah = $keys[0];
        $atas  = end($keys);
        foreach ($keys as $k) {
            if ($k <= $usiaBulan) $bawah = $k;
            if ($k >= $usiaBulan) { $atas = $k; break; }
        }

        if ($bawah === $atas) {
            return $tabel[$bawah];
        }

        $rasio = ($usiaBulan - $bawah) / ($atas - $bawah);
        return $tabel[$bawah] + ($rasio * ($tabel[$atas] - $tabel[$bawah]));
    }

    private static function hitungZScore(int $usiaBulan, float $nilai, string $jenisKelamin, string $jenis): float
    {
        if ($jenis === 'berat') {
            $median = self::interpolasi(self::WEIGHT_MEDIAN[$jenisKelamin], $usiaBulan);
            $sd = $median * self::SD_WEIGHT_FACTOR;
        } else {
            $median = self::interpolasi(self::HEIGHT_MEDIAN[$jenisKelamin], $usiaBulan);
            $sd = $median * self::SD_HEIGHT_FACTOR;
        }

        if ($sd <= 0) return 0;
        return ($nilai - $median) / $sd;
    }

    private static function getStatusGiziDariZ(float $z): string
    {
        if ($z < -3) return 'gizi_buruk';
        if ($z < -2) return 'gizi_kurang';
        if ($z <= 1) return 'gizi_baik';
        if ($z <= 2) return 'gizi_lebih';
        return 'obesitas';
    }

    private static function getStatusTinggiDariZ(float $z): string
    {
        if ($z < -3) return 'sangat_pendek';
        if ($z < -2) return 'pendek';
        if ($z <= 3) return 'normal';
        return 'tinggi';
    }

    private static function getLabelStatus(string $gizi, string $tinggi): array
    {
        $mapGizi = [
            'gizi_buruk'  => ['teks' => 'Perlu Perhatian Gizi', 'warna' => 'badge-buruk'],
            'gizi_kurang' => ['teks' => 'Perlu Peningkatan Asupan Gizi', 'warna' => 'badge-kurang'],
            'gizi_baik'   => ['teks' => 'Status Gizi Baik', 'warna' => 'badge-baik'],
            'gizi_lebih'  => ['teks' => 'Status Gizi Berlebih', 'warna' => 'badge-lebih'],
            'obesitas'    => ['teks' => 'Perlu Pengelolaan Berat Badan', 'warna' => 'badge-lebih'],
        ];

        $mapTinggi = [
            'sangat_pendek' => ['teks' => 'Perlu Perhatian Tinggi', 'warna' => 'badge-buruk'],
            'pendek'        => ['teks' => 'Perlu Pemantauan Pertumbuhan', 'warna' => 'badge-kurang'],
            'normal'        => ['teks' => 'Pertumbuhan Sesuai Usia', 'warna' => 'badge-baik'],
            'tinggi'        => ['teks' => 'Pertumbuhan Di Atas Rata-rata', 'warna' => 'badge-baik'],
        ];

        return [
            'gizi' => $mapGizi[$gizi] ?? ['teks' => 'Tidak diketahui', 'warna' => 'badge-baik'],
            'tinggi' => $mapTinggi[$tinggi] ?? ['teks' => 'Tidak diketahui', 'warna' => 'badge-baik'],
        ];
    }

    private static function getPesanStatus(string $status): string
    {
        $pesan = [
            'gizi_buruk'  => 'Status gizi buruk. Segera konsultasikan ke dokter atau ahli gizi untuk penanganan lebih lanjut.',
            'gizi_kurang' => 'Status gizi kurang. Perhatikan asupan makanan bergizi dan konsultasikan ke ahli gizi.',
            'gizi_baik'   => 'Status gizi baik. Pertahankan pola makan sehat dan bergizi seimbang.',
            'gizi_lebih'  => 'Status gizi lebih. Perhatikan porsi makan dan tingkatkan aktivitas fisik.',
            'obesitas'    => 'Status obesitas. Segera konsultasikan ke dokter untuk program penurunan berat badan yang sehat.',
        ];
        return $pesan[$status] ?? 'Status gizi dalam pantauan.';
    }

    private static function getSaranUmum(string $status, int $usiaBulan): array
    {
        $saran = [
            'gizi_buruk' => [
                'Segera konsultasikan ke dokter atau ahli gizi',
                'Berikan makanan padat energi dan nutrisi tinggi',
                'Pantau berat badan setiap minggu',
                'Pastikan anak mendapatkan ASI/susu sesuai usia',
            ],
            'gizi_kurang' => [
                'Tingkatkan frekuensi makan menjadi 3 kali utama + 2 kali selingan',
                'Tambahkan protein hewani (telur, ikan, ayam)',
                'Berikan makanan beragam dan bergizi seimbang',
                'Konsultasikan ke ahli gizi untuk program pemulihan',
            ],
            'gizi_baik' => [
                'Pertahankan pola makan 3 kali utama + 2 kali selingan',
                'Variasi menu dengan protein, karbohidrat, sayur dan buah',
                'Penuhi kebutuhan cairan harian',
                'Pantau pertumbuhan rutin setiap bulan',
            ],
            'gizi_lebih' => [
                'Kurangi makanan tinggi gula dan lemak jenuh',
                'Perhatikan porsi makan (jangan berlebihan)',
                'Tingkatkan aktivitas fisik anak',
                'Konsultasi ke ahli gizi untuk program penurunan berat badan',
            ],
            'obesitas' => [
                'Segera konsultasi ke dokter untuk program penurunan berat badan',
                'Batasi konsumsi makanan cepat saji dan tinggi gula',
                'Perbanyak aktivitas fisik dan olahraga',
                'Pengawasan ketat dari ahli gizi',
            ],
        ];

        $saranUniversal = [
            'Pastikan anak mendapat ASI eksklusif hingga 6 bulan' . ($usiaBulan < 6 ? ' (sekarang)' : ''),
            'Berikan MPASI bergizi seimbang mulai usia 6 bulan' . ($usiaBulan >= 6 ? ' (sudah waktunya)' : ''),
            'Penuhi kebutuhan cairan sesuai usia',
        ];

        return array_merge($saran[$status] ?? $saran['gizi_baik'], $saranUniversal);
    }
}