<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `rekap_masuks`.
     */
    public function up(): void
    {
        Schema::create('rekap_masuks', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('jenis_transaksi'); // Jenis transaksi (required, string)
            $table->date('tanggal_masuk'); // Tanggal masuk (required, date)
            $table->decimal('jumlah_masuk', 10, 2); // Jumlah masuk (required, numeric, 2 desimal)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Batalkan migrasi untuk menghapus tabel `rekap_masuks`.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_masuks'); // Hapus tabel jika rollback dilakukan
    }
};