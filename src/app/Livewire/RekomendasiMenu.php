<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\GiziCalculator;
use App\Models\Menu;
use App\Models\KategoriUsia;
use App\Models\Alergen;

class RekomendasiMenu extends Component
{
    // ── STATE ──────────────────────────────────────────────────────────────────
    public string $step = 'form'; // 'form' | 'hasil'

    // Form fields
    public string $namaAnak      = '';
    public string $tanggalLahir  = '';
    public string $jenisKelamin  = 'L';
    public string $beratBadan    = '';
    public string $tinggiBadan   = '';
    public array  $alergenDipilih = [];

    // Hasil analisis
    public ?array  $analisis    = null;
    public ?object $kategori    = null;
    public array   $makanUtama  = [];
    public array   $selingan    = [];
    public bool    $asiOnly     = false;

    // UI state
    public string  $tabAktif       = 'makan_utama'; // 'makan_utama' | 'selingan'
    public ?int    $menuDetailId   = null;
    public ?array  $menuDetail     = null;
    public bool    $showModal      = false;
    public bool    $isLoading      = false;

    // Filter waktu makan
    public string $filterWaktu = 'semua'; // 'semua' | 'sarapan' | 'makan_siang' | 'makan_malam' | 'selingan'

    // ── VALIDASI ───────────────────────────────────────────────────────────────
    protected function rules(): array
    {
        return [
            'namaAnak'      => 'nullable|string|max:100',
            'tanggalLahir'  => 'required|date|before:today',
            'jenisKelamin'  => 'required|in:L,P',
            'beratBadan'    => 'required|numeric|min:1|max:50',
            'tinggiBadan'   => 'required|numeric|min:30|max:130',
            'alergenDipilih' => 'nullable|array',
            'alergenDipilih.*' => 'exists:alergens,id',
        ];
    }

    protected function messages(): array
    {
        return [
            'tanggalLahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggalLahir.before'   => 'Tanggal lahir harus sebelum hari ini.',
            'beratBadan.required'   => 'Berat badan wajib diisi.',
            'beratBadan.min'        => 'Berat badan minimal 1 kg.',
            'beratBadan.max'        => 'Berat badan maksimal 50 kg.',
            'tinggiBadan.required'  => 'Tinggi badan wajib diisi.',
            'tinggiBadan.min'       => 'Tinggi badan minimal 30 cm.',
            'tinggiBadan.max'       => 'Tinggi badan maksimal 130 cm.',
        ];
    }

    // ── CARI REKOMENDASI ───────────────────────────────────────────────────────
    public function cariRekomendasi(): void
    {
        $this->validate();

        $this->analisis = GiziCalculator::analisis(
            tanggalLahir: $this->tanggalLahir,
            bb:           (float) $this->beratBadan,
            tb:           (float) $this->tinggiBadan,
            jenisKelamin: $this->jenisKelamin,
        );

        // ⭐ FIX: ambil kategori langsung dari hasil analisis (by ID),
        // bukan cari ulang pakai slug yang sudah tidak dipakai lagi
        $this->kategori = $this->analisis['kategori_usia_id']
            ? KategoriUsia::find($this->analisis['kategori_usia_id'])
            : null;

        // ⭐ FIX: ASI eksklusif dideteksi dari flag di hasil analisis
        if ($this->analisis['asi_only'] || !$this->kategori) {
            $this->asiOnly    = true;
            $this->makanUtama = [];
            $this->selingan   = [];
            $this->step       = 'hasil';
            return;
        }

        $this->asiOnly = false;

        $query = Menu::where('kategori_usia_id', $this->kategori->id)
            ->where('is_aktif', true)
            ->with('alergens');

        if (!empty($this->alergenDipilih)) {
            $query->whereDoesntHave('alergens', function ($q) {
                $q->whereIn('alergens.id', $this->alergenDipilih);
            });
        }

        $statusGizi = $this->analisis['status_gizi'];
        if (in_array($statusGizi, ['gizi_kurang', 'gizi_buruk'])) {
            $query->orderBy('kalori', 'desc');
        } elseif ($statusGizi === 'gizi_lebih' || $statusGizi === 'obesitas') {
            $query->orderBy('kalori', 'asc');
        } else {
            $query->inRandomOrder();
        }

        $semuaMenu = $query->get();

        $this->makanUtama = $semuaMenu
            ->where('waktu_makan', '!=', 'selingan')
            ->values()
            ->map(fn($m) => $this->menuToArray($m))
            ->toArray();

        $this->selingan = $semuaMenu
            ->where('waktu_makan', 'selingan')
            ->values()
            ->map(fn($m) => $this->menuToArray($m))
            ->toArray();

        $this->step = 'hasil';
        $this->tabAktif = 'makan_utama';
        $this->filterWaktu = 'semua';
    }

    // ── HELPER: Model → array ─────────────────────────────────────────────────
    private function menuToArray(Menu $menu): array
    {
        return [
            'id'          => $menu->id,
            'nama'        => $menu->nama,
            'deskripsi'   => $menu->deskripsi,
            'foto'        => $menu->foto,
            'waktu_makan' => $menu->waktu_makan,
            'kalori'      => $menu->kalori,
            'protein'     => $menu->protein,
            'lemak'       => $menu->lemak,
            'karbohidrat' => $menu->karbohidrat,
            'serat'       => $menu->serat ?? 0,
            'air'         => $menu->air ?? 0,
            'zat_besi'    => $menu->zat_besi,
            'bahan'       => $menu->bahan,
            'cara_masak'  => $menu->cara_masak,
            'alergens'    => $menu->alergens->pluck('nama')->toArray(),
        ];
    }

    // ── GETTER: Menu yang ditampilkan (dengan filter) ──────────────────────
    public function getMenuDitampilProperty(): array
    {
        $base = $this->tabAktif === 'makan_utama' 
            ? $this->makanUtama 
            : $this->selingan;

        if ($this->filterWaktu === 'semua') {
            return $base;
        }

        return array_filter($base, function ($menu) {
            return $menu['waktu_makan'] === $this->filterWaktu;
        });
    }

    // ── AKSI UI ──────────────────────────────────────────────────────────────
    public function lihatDetail(int $menuId): void
    {
        $semuaMenu = array_merge($this->makanUtama, $this->selingan);
        $this->menuDetail = collect($semuaMenu)->firstWhere('id', $menuId);
        $this->showModal  = true;
    }

    public function tutupModal(): void
    {
        $this->showModal  = false;
        $this->menuDetail = null;
    }

    public function setTab(string $tab): void
    {
        $this->tabAktif = $tab;
        $this->filterWaktu = 'semua';
    }

    public function setFilter(string $filter): void
    {
        $this->filterWaktu = $filter;
    }

    public function kembaliForm(): void
    {
        $this->step      = 'form';
        $this->analisis  = null;
        $this->showModal = false;
        $this->resetValidation();
    }

    // ── RENDER ─────────────────────────────────────────────────────────────────
    public function render()
    {
        $alergens = Alergen::orderBy('nama')->get();

        // Statistik
        $totalMenu = Menu::where('is_aktif', true)->count();
        $totalKategoriUsia = KategoriUsia::count();
        $totalAlergen = Alergen::count();

        return view('livewire.rekomendasi-menu', [
            'alergens'       => $alergens,
            'menuDitampil'   => $this->menuDitampil,
            'totalMenu'      => $totalMenu,
            'totalKategoriUsia' => $totalKategoriUsia,
            'totalAlergen'   => $totalAlergen,
        ])->layout('layouts.nutrikids');
    }
}