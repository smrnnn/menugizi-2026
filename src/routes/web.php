<?php

use App\Livewire\RekomendasiMenu;
use Illuminate\Support\Facades\Route;

// ═══════════════════════════════════════
// HALAMAN UTAMA — Rekomendasi Menu (Livewire full-page component)
// ═══════════════════════════════════════
Route::get('/', RekomendasiMenu::class)->name('home');

// ═══════════════════════════════════════
// HALAMAN TENTANG
// ═══════════════════════════════════════
Route::view('/tentang', 'pages.about')->name('about');