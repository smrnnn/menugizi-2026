<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\KategoriUsia;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kategori
        $kategori = KategoriUsia::pluck('id', 'slug')->toArray();

        // ✅ PASTIKAN SEMUA KEY INI ADA di $kategori
        // Key yang tersedia: 'asi_eksklusif', '6-11_bulan', '1-3_tahun', '4-6_tahun'

        // Data menu
        $menus = [
            // ============ MPASI 6-8 BULAN ============
            [
                'nama' => 'Bubur Ayam Brokoli',
                'kategori_usia_id' => $kategori['6-11_bulan'] ?? null, // ✅ PAKAI SLUG YANG BENAR
                'foto' => 'menu/bubur-ayam-brokoli.jpg',
                'deskripsi' => 'MPASI bergizi dengan ayam dan brokoli',
                'waktu_makan' => 'makan_siang',
                'kalori' => 120,
                'protein' => 6,
                'lemak' => 4,
                'karbohidrat' => 15,
                'serat' => 2,
                'air' => 100,
                'zat_besi' => 1.5,
                'bahan' => "Nasi 2 sdm\nAyam giling 30g\nBrokoli 20g\nWortel 20g\nMinyak kelapa 1sdt",
                'cara_masak' => "1. Rebus ayam hingga matang\n2. Haluskan semua bahan\n3. Tambahkan minyak kelapa\n4. Sajikan hangat",
                'is_aktif' => true,
            ],
            // ... tambahkan menu lainnya
        ];

        foreach ($menus as $menu) {
            if ($menu['kategori_usia_id']) {
                Menu::updateOrCreate(
                    ['nama' => $menu['nama']],
                    $menu
                );
            }
        }
    }
}