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
        Schema::create('rencana_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->enum('jenis_kegiatan', ['Pemeriksaan', 'Pembinaan', 'Pengujian'])->default('Pemeriksaan');
            $table->string('nama_perusahaan');
            $table->date('tanggal_pelaksanaan');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['belum disetujui', 'sudah disetujui', 'tidak disetujui'])
                  ->default('belum disetujui');
            $table->foreign('nama_perusahaan')->references('nama_perusahaan')->on('perusahaan')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_kerja');
    }
};
