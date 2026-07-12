<?php

namespace App\Http\Controllers;

use App\Helpers\GiziCalculator;
use App\Models\Menu;
use App\Models\KategoriUsia;
use Illuminate\Http\Request;

/**
 * Controller untuk halaman rekomendasi menu.
 *
 * Route (routes/web.php):
 *   Route::get('/',          [RekomendasiController::class, 'index'])->name('home');
 *   Route::post('/rekomendasi', [RekomendasiController::class, 'rekomendasi'])->name('rekomendasi');
 *
 * Atau jika pakai Livewire, logika ini bisa dipindah ke Livewire Component.
 */
class RekomendasiController extends Controller
{
    /**
     * Halaman utama — tampilkan form input data anak.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Proses form → tampilkan hasil rekomendasi.
     */
    public function rekomendasi(Request $request)
    {
        // ── 1. VALIDASI ────────────────────────────────────────────────
        $validated = $request->validate([
            'nama_anak'      => 'nullable|string|max:100',
            'tanggal_lahir'  => 'required|date|before:today',
            'jenis_kelamin'  => 'required|in:L,P',
            'berat_badan'    => 'required|numeric|min:1|max:50',
            'tinggi_badan'   => 'required|numeric|min:30|max:130',
            'alergen_ids'    => 'nullable|array',
            'alergen_ids.*'  => 'exists:alergens,id',
        ], [
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'berat_badan.min'      => 'Berat badan tidak valid.',
            'tinggi_badan.min'     => 'Tinggi badan tidak valid.',
        ]);

        // ── 2. ANALISIS GIZI ───────────────────────────────────────────
        $analisis = GiziCalculator::analisis(
            tanggalLahir:  $validated['tanggal_lahir'],
            bb:            (float) $validated['berat_badan'],
            tb:            (float) $validated['tinggi_badan'],
            jenisKelamin:  $validated['jenis_kelamin'],
        );

        // ── 3. AMBIL KELOMPOK USIA dari DB ─────────────────────────────
        $kategori = KategoriUsia::where('slug', $analisis['kelompok_usia'])->first();

        // Jika bayi < 6 bulan (ASI eksklusif), tidak ada rekomendasi menu
        if ($analisis['kelompok_usia'] === 'asi_eksklusif') {
            return view('rekomendasi', [
                'analisis'   => $analisis,
                'kategori'   => $kategori,
                'namaAnak'   => $validated['nama_anak'] ?? 'Anak',
                'menus'      => collect(),
                'alergenIds' => [],
                'asiOnly'    => true,
            ]);
        }

        // ── 4. QUERY MENU ──────────────────────────────────────────────
        $alergenIds = $validated['alergen_ids'] ?? [];

        $menus = Menu::query()
            ->where('kategori_usia_id', $kategori->id)
            ->where('is_aktif', true)

            // Kecualikan menu yang mengandung alergen yang dipilih orang tua
            ->when(!empty($alergenIds), function ($query) use ($alergenIds) {
                $query->whereDoesntHave('alergens', function ($q) use ($alergenIds) {
                    $q->whereIn('alergens.id', $alergenIds);
                });
            })

            // Sortir berdasarkan status gizi:
            // gizi_kurang/buruk → prioritaskan menu kalori tinggi
            // gizi_lebih → prioritaskan menu kalori rendah
            ->when(
                in_array($analisis['status_gizi'], ['gizi_kurang', 'gizi_buruk']),
                fn($q) => $q->orderBy('kalori', 'desc')
            )
            ->when(
                $analisis['status_gizi'] === 'gizi_lebih',
                fn($q) => $q->orderBy('kalori', 'asc')
            )
            ->when(
                $analisis['status_gizi'] === 'gizi_baik',
                fn($q) => $q->inRandomOrder()
            )

            ->with('alergens') // eager load untuk tampilan badge alergen
            ->get();

        // ── 5. PISAHKAN MAKAN UTAMA & SELINGAN ─────────────────────────
        $makanUtama = $menus->where('waktu_makan', 'makan_utama');
        $selingan   = $menus->where('waktu_makan', 'selingan');

        return view('rekomendasi', [
            'analisis'   => $analisis,
            'kategori'   => $kategori,
            'namaAnak'   => $validated['nama_anak'] ?? 'Anak',
            'makanUtama' => $makanUtama,
            'selingan'   => $selingan,
            'alergenIds' => $alergenIds,
            'asiOnly'    => false,
        ]);
    }
}
