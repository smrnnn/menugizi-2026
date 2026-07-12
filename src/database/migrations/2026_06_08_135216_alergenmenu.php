<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alergen_menu', function (Blueprint $table) {
            $table->id();
            
            // ✅ PASTIKAN TIPE DATA SAMA DENGAN TABEL MENUS
            // Jika menus.id = bigint unsigned, maka menu_id juga bigint unsigned
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->foreignId('alergen_id')->constrained('alergens')->onDelete('cascade');
            
            // Biar tidak ada duplikat relasi
            $table->unique(['menu_id', 'alergen_id']);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alergen_menu');
    }
};