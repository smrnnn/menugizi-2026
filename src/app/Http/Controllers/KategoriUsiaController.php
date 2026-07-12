<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriUsia extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'usia_min_bulan',
        'usia_max_bulan',
        'kalori_harian',
        'protein_harian',
        'lemak_harian',        // TAMBAHKAN
        'karbohidrat_harian',  // TAMBAHKAN
        'serat_harian',        // TAMBAHKAN
        'air_harian',          // TAMBAHKAN
    ];

    protected $casts = [
        'kalori_harian' => 'decimal:2',
        'protein_harian' => 'decimal:2',
        'lemak_harian' => 'decimal:2',
        'karbohidrat_harian' => 'decimal:2',
        'serat_harian' => 'decimal:2',
        'air_harian' => 'decimal:2',
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}