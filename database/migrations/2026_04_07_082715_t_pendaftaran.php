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
        Schema::create('t_pendaftaran', function (Blueprint $table) {
            $table->id('id_daftar');
            $table->foreignId('id_peserta')->references('id_peserta')->on('t_peserta')->onDelete('cascade');
            $table->foreignId('kd_jurusan')->references('kd_jurusan')->on('t_jurusan')->onDelete('cascade');
            $table->date('tgl_daftar');
            $table->enum('status', ['Aktif', 'Selesai', 'Batal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pendaftaran');
    }
};
