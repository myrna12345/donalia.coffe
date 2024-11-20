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
        Schema::table('rekap_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->date('tanggal_masuk');
            $table->decimal('jumlah_masuk', 10, 2);
            $table->integer('menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap__masuks');
    }
};
