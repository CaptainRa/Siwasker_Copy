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
        Schema::create('laporan_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nomor_spt');
            $table->date('tanggal_spt');
            $table->enum('jenis_anggaran', ['Rencana Kerja (Non Anggaran)', 
                    'Rencana Kerja (APBD)', 'Rencana Kerja (APBN)']);
            $table->string('nama_perusahaan');
            $table->integer('tk');
            $table->integer('wlkp')->default(0);
            $table->integer('wkwi')->default(0);
            $table->integer('tka')->default(0);
            $table->integer('kompensasi')->default(0);
            $table->integer('tki')->default(0);
            $table->integer('ump')->default(0);
            $table->integer('lembur')->default(0);
            $table->integer('thr')->default(0);
            $table->integer('cutith')->default(0);
            $table->integer('cutihamil')->default(0);
            $table->integer('pkb')->default(0);
            $table->integer('susu')->default(0);
            $table->integer('jamsos')->default(0);
            $table->integer('k3')->default(0);
            $table->string('lainnya');
            $table->date('tanggal_np_I')->nullable();
            $table->string('no_np_I')->nullable();
            $table->date('tanggal_np_II')->nullable();
            $table->string('no_np_II')->nullable();
            $table->string('lhpp')->nullable();
            $table->string('no_tmp2t')->nullable();
            $table->date('tanggal_tmp2t')->nullable();
            $table->enum('keterangan', ['On Progress', 'Selesai']);
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
        Schema::dropIfExists('laporan_kerja');
    }
};
