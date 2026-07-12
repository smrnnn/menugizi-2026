<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriUsia extends Model
{
    use HasFactory;

    protected $table = 'kategori_usias';

    // ⭐ Field lemak, karbohidrat, serat, air ditambahkan
    // Ini yang sebelumnya bikin serat & air tidak pernah tersimpan
    protected $fillable = [
        'nama',
        'slug',
        'usia_min_bulan',
        'usia_max_bulan',
        'kalori_harian',
        'protein_harian',
        'lemak_harian',
        'karbohidrat_harian',
        'serat_harian',
        'air_harian',
        'catatan_khusus',
        'urutan',
    ];

    protected $casts = [
        'kalori_harian'       => 'integer',
        'protein_harian'      => 'decimal:2',
        'lemak_harian'        => 'decimal:2',
        'karbohidrat_harian'  => 'decimal:2',
        'serat_harian'        => 'decimal:2',
        'air_harian'          => 'decimal:2',
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}