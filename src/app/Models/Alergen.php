<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alergen extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'ikon',
    ];

    // ✅ Relasi balik ke Menu
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(
            Menu::class,
            'alergen_menu',
            'alergen_id',
            'menu_id'
        );
    }
}