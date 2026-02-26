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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('topik');
            $table->text('aduan');
            $table->string('perusahaan');
            $table->string('kontak');
            $table->string('kanal');
            $table->date('waktu');
            $table->enum('status', ['Selesai', 'Progress', 'Verifikasi'])->default('Verifikasi');
            $table->enum('progres', ['Belum Diajukan', 'Sudah Dijadwalkan', 'Sudah Diajukan', 'Belum Dijadwalkan'])->default('Belum Diajukan');
            $table->string('keterangan');
            $table->string('nip_pengawas');
            $table->foreign('nip_pengawas')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('perusahaan')->references('nama_perusahaan')->on('perusahaan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
