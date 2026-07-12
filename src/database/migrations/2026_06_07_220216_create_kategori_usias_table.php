<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_usias', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->integer('usia_min_bulan');
            $table->integer('usia_max_bulan');
            $table->integer('kalori_harian');
            
            // ⚠️ HAPUS semua 'after' di sini!
            $table->decimal('protein_harian', 8, 2)->nullable();
            $table->decimal('lemak_harian', 8, 2)->nullable();
            $table->decimal('karbohidrat_harian', 8, 2)->nullable();
            $table->decimal('serat_harian', 8, 2)->nullable();
            $table->decimal('air_harian', 8, 2)->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_usias');
    }
};