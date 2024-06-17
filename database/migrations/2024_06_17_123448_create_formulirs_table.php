<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->string('code_form')->unique();

            // Identitas Pemohon
            $table->string('nama_pemohon', 60);
            $table->string('alamat_pemohon', 60);
            $table->string('no_hp_pemohon', 60);
            $table->string('email_pemohon', 60)->nullable();

            // Bahan Konstruksi
            $table->unsignedBigInteger('bahan_id');
            $table->foreign('bahan_id')->references('id')->on('bahans')->onDelete('cascade');
            $table->string('quantity', 60);
            $table->string('keterangan_lain', 60)->nullable();
            $table->string('uraian_pengujian', 60);
            $table->string('keperluan_pengujian', 60);

            // Pelaksana / Kontraktor
            $table->string('kontraktor_nama', 60);
            $table->string('kontraktor_alamat', 60);

            // Dokumen Permohonan
            $table->string('dokumen');
            // Sisa Contoh
            $table->enum('sisa_contoh', ['akan di ambil lagi', 'tidak diambil lagi']);
            // Status Permohonan
            $table->enum('status', ['pengajuan', 'ceklist', 'pengujian']);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulirs');
    }
};
