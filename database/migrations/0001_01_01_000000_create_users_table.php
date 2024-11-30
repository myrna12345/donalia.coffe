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
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('email')->unique(); // Unique Key
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); // created_at dan updated_at
        });

        // Tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary Key
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary Key
            $table->foreignId('user_id')->nullable()->index(); // Relasi ke users
            $table->string('ip_address', 45)->nullable(); // Untuk mendukung IPv4 dan IPv6
            $table->text('user_agent')->nullable(); // Informasi browser
            $table->longText('payload'); // Data sesi
            $table->integer('last_activity')->index(); // Aktivitas terakhir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel dalam urutan yang benar
        Schema::dropIfExists('sessions'); // Hapus tabel sessions terlebih dahulu
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};