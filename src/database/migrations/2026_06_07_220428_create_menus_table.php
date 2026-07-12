<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            
            // ✅ Foreign key ke kategori_usias
            $table->foreignId('kategori_usia_id')
                  ->constrained('kategori_usias')
                  ->onDelete('cascade');
            
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('waktu_makan', ['sarapan', 'makan_siang', 'makan_malam', 'selingan'])->default('makan_siang');
            
            // Nutrisi
            $table->decimal('kalori', 8, 2)->nullable();
            $table->decimal('protein', 8, 2)->nullable();
            $table->decimal('lemak', 8, 2)->nullable();
            $table->decimal('karbohidrat', 8, 2)->nullable();
            $table->decimal('serat', 8, 2)->nullable();
            $table->decimal('air', 8, 2)->nullable();
            $table->decimal('zat_besi', 8, 2)->nullable();
            
            $table->text('bahan')->nullable();
            $table->text('cara_masak')->nullable();
            $table->boolean('is_aktif')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};