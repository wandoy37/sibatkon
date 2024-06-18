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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->string('diterima_tanggal', 60);
            $table->unsignedBigInteger('formulir_id');
            $table->foreign('formulir_id')->references('id')->on('formulirs')->onDelete('cascade');
            $table->string('job_mix', 90);
            $table->string('no_spu', 90);
            $table->string('tahun_anggaran', 4);
            $table->unsignedBigInteger('penerima_id');
            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
