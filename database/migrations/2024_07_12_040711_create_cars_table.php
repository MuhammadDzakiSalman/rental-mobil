<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('tipe');
            $table->string('nomor_plat');
            $table->string('tahun');
            $table->string('warna');
            $table->boolean('status')->default(false);
            $table->integer('harga_sewa');
            $table->integer('denda');
            $table->string('gambar');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
