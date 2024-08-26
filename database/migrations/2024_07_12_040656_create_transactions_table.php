<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mobil')->references('id')->on('cars')->onDelete('cascade');
            $table->unsignedBigInteger('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('tanggal_selesai');
            $table->integer('jumlah_hari');
            $table->integer('denda')->nullable();
            $table->integer('total_harga');
            $table->integer('total_pembayaran')->nullable();
            $table->string('bukti_pembayaran');
            $table->enum('status_rental', ['ditolak', 'diproses', 'disewa', 'selesai'])->default('diproses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
