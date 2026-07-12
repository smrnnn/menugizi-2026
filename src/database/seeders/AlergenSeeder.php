<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlergenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alergens')->delete();

        $data = [
            [
                'slug' => 'telur',
                'nama' => 'Telur',
            ],
            [
                'slug' => 'susu_sapi',
                'nama' => 'Susu Sapi',
            ],
            [
                'slug' => 'kacang_tanah',
                'nama' => 'Kacang Tanah',
            ],
            [
                'slug' => 'kacang_pohon',
                'nama' => 'Kacang Pohon',
            ],
            [
                'slug' => 'seafood',
                'nama' => 'Seafood',
            ],
            [
                'slug' => 'ikan',
                'nama' => 'Ikan',
            ],
            [
                'slug' => 'gluten',
                'nama' => 'Gluten',
            ],
            [
                'slug' => 'kedelai',
                'nama' => 'Kedelai',
            ],
        ];

        foreach ($data as $row) {
            DB::table('alergens')->insert([
                ...$row,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}