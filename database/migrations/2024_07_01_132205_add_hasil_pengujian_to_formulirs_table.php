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
        Schema::table('formulirs', function (Blueprint $table) {
            $table->string('hasil_pengujian')->nullable()->after('status');
            $table->string('kasi_pengujian_id')->nullable()->after('hasil_pengujian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formulirs', function (Blueprint $table) {
            $table->dropColumn('hasil_pengujian');
            $table->dropColumn('kasi_pengujian_id');
        });
    }
};
