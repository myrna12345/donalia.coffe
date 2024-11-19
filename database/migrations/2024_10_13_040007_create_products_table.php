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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->text('kategori');
            $table->bigInteger('harga');
            $table->integer('jumlah')->default(0);
            $table->date('tanggal_masuk');
            $table->date('tanggal_kadaluarsa');
            $table->text('bahan_sering_digunakan');
            $table->text('bahan_jarang_digunakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};