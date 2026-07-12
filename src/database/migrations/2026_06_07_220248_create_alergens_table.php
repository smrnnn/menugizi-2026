<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alergens', function (Blueprint $table) {
            $table->id(); // ✅ bigint unsigned auto-increment
            $table->string('nama')->unique();
            $table->string('slug')->unique();
            $table->string('ikon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alergens');
    }
};