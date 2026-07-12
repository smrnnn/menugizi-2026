<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $fillable = [
        'nama',
        'kategori_usia_id',
        'foto',
        'deskripsi',
        'waktu_makan',
        'kalori',
        'protein',
        'lemak',
        'karbohidrat',
        'serat',
        'air',
        'zat_besi',
        'bahan',
        'cara_masak',
        'is_aktif',
    ];

    protected $casts = [
        'is_aktif'    => 'boolean',
        'kalori'      => 'decimal:2',
        'protein'     => 'decimal:2',
        'lemak'       => 'decimal:2',
        'karbohidrat' => 'decimal:2',
        'serat'       => 'decimal:2',
        'air'         => 'decimal:2',
        'zat_besi'    => 'decimal:2',
    ];

    public function kategoriUsia(): BelongsTo
    {
        return $this->belongsTo(KategoriUsia::class);
    }

    // ⭐ Nama relasi disamakan jadi "alergens" (Indonesia)
    // karena di Livewire/blade semua sudah pakai nama ini
    public function alergens(): BelongsToMany
    {
        return $this->belongsToMany(
            Alergen::class,
            'alergen_menu',
            'menu_id',
            'alergen_id'
        );
    }
}