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
        Schema::create('penulis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penulis'); // Kolom nama penulis
            $table->string('nama_pena')->nullable(); // Kolom nama pena (opsional)
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Kolom jenis kelamin
            $table->date('tanggal_lahir'); // Kolom tanggal lahir
            $table->string('tempat_lahir'); // Kolom tempat lahir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penulis');
    }
};
