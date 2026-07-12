# NutriKids — Panduan Integrasi Template

## Struktur File yang Dibuat

```
nutrikids/
├── livewire/
│   └── RekomendasiMenu.php          → app/Livewire/RekomendasiMenu.php
├── views/
│   ├── layouts/
│   │   └── nutrikids.blade.php      → resources/views/layouts/nutrikids.blade.php
│   └── livewire/
│       └── rekomendasi-menu.blade.php → resources/views/livewire/rekomendasi-menu.blade.php
└── routes_web.php                   → tambahkan isinya ke routes/web.php
```

## Langkah Integrasi ke Project Laravel

### 1. Copy semua file ke posisi yang benar

```bash
# Dari root project Laravel
cp RekomendasiMenu.php app/Livewire/RekomendasiMenu.php
cp nutrikids.blade.php resources/views/layouts/nutrikids.blade.php
cp rekomendasi-menu.blade.php resources/views/livewire/rekomendasi-menu.blade.php
```

### 2. Tambahkan route ke routes/web.php

```php
use App\Livewire\RekomendasiMenu;

Route::get('/', RekomendasiMenu::class)->name('home');
```

### 3. Pastikan model sudah ada & relasi sudah dibuat

File model yang dibutuhkan:
- `app/Models/KategoriUsia.php`
- `app/Models/Alergen.php`
- `app/Models/Menu.php`

Relasi yang harus ada di `Menu.php`:
```php
public function alergens()
{
    return $this->belongsToMany(Alergen::class, 'alergen_menu');
}

public function kategoriUsia()
{
    return $this->belongsTo(KategoriUsia::class);
}
```

Relasi yang harus ada di `Alergen.php`:
```php
public function menus()
{
    return $this->belongsToMany(Menu::class, 'alergen_menu');
}
```

### 4. Pastikan GiziCalculator sudah ada

File: `app/Helpers/GiziCalculator.php`
Register di `composer.json`:
```json
"autoload": {
    "files": [
        "app/Helpers/GiziCalculator.php"
    ]
}
```
Lalu jalankan: `composer dump-autoload`

### 5. Install Livewire (jika belum)

```bash
dca require livewire/livewire
```

### 6. Jalankan migration & seeder

```bash
dca migrate
dca db:seed
```

### 7. Akses website

```bash
dcu   # docker compose up
```
Buka: http://localhost/

---

## Catatan Penting

### Tailwind CSS
Template ini pakai Tailwind CDN untuk kemudahan development.
Untuk production, ganti dengan Vite build:
```bash
npm install -D tailwindcss
npx tailwindcss init
```

### Upload foto menu
Untuk upload foto di admin Filament, tambahkan di `MenuResource.php`:
```php
Forms\Components\FileUpload::make('foto')
    ->image()
    ->directory('menus')
    ->disk('public'),
```
Dan jalankan: `dca storage:link`

### Print PDF
Tombol "Cetak / Simpan PDF" menggunakan `window.print()` bawaan browser.
Untuk PDF yang lebih bagus, install `barryvdh/laravel-dompdf`:
```bash
dca require barryvdh/laravel-dompdf
```

### Custom colors di Tailwind config
Warna `hijau` dan `amber` sudah dikonfigurasi di `<script>` dalam layout.
Jika pakai Vite, pindahkan config ini ke `tailwind.config.js`.
