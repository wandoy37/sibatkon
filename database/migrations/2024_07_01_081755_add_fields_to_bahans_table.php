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
        Schema::table('bahans', function (Blueprint $table) {
            $table->string('harga')->nullable()->after('nama');
            $table->string('volume')->nullable()->after('harga');
            $table->string('keterangan')->nullable()->after('volume');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bahans', function (Blueprint $table) {
            $table->dropColumn('harga');
            $table->dropColumn('volume');
            $table->dropColumn('keterangan');
        });
    }
};
