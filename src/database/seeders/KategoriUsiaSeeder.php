<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUsia;

class KategoriUsiaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'ASI Eksklusif',
                'slug' => 'asi_eksklusif',  // ✅ Pakai ini
                'usia_min_bulan' => 0,
                'usia_max_bulan' => 5,
                'kalori_harian' => 550,
                'protein_harian' => 9,
                'lemak_harian' => 31,
                'karbohidrat_harian' => 59,
                'serat_harian' => 0,
                'air_harian' => 700,
            ],
            [
                'nama' => '6-11 Bulan',
                'slug' => '6-11_bulan',     // ✅ Pakai ini
                'usia_min_bulan' => 6,
                'usia_max_bulan' => 11,
                'kalori_harian' => 800,
                'protein_harian' => 15,
                'lemak_harian' => 35,
                'karbohidrat_harian' => 105,
                'serat_harian' => 11,
                'air_harian' => 900,
            ],
            [
                'nama' => '1-3 Tahun',
                'slug' => '1-3_tahun',      // ✅ Pakai ini
                'usia_min_bulan' => 12,
                'usia_max_bulan' => 36,
                'kalori_harian' => 1350,
                'protein_harian' => 20,
                'lemak_harian' => 45,
                'karbohidrat_harian' => 215,
                'serat_harian' => 19,
                'air_harian' => 1150,
            ],
            [
                'nama' => '4-6 Tahun',
                'slug' => '4-6_tahun',      // ✅ Pakai ini
                'usia_min_bulan' => 37,
                'usia_max_bulan' => 72,
                'kalori_harian' => 1400,
                'protein_harian' => 25,
                'lemak_harian' => 50,
                'karbohidrat_harian' => 220,
                'serat_harian' => 20,
                'air_harian' => 1450,
            ],
        ];

        foreach ($data as $item) {
            KategoriUsia::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}