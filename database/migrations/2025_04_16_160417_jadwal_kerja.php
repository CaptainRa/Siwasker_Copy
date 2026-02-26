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
        Schema::create('jadwal_kerja', function (blueprint $table){
            $table->id();
            $table->enum('kegiatan', ['Aduan', 'Rencana Kerja', 'Lain-lain']);
            $table->string('pegawai');
            $table->string('kode_aduan')->nullable();
            $table->unsignedBigInteger('id_rk')->nullable();
            $table->boolean('is_lainnya')->default(0);
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
            // $table->date('tanggal');
            $table->timestamps();
            $table->foreign('pegawai')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('kode_aduan')->references('kode')->on('aduan')->onDelete('cascade');
            $table->foreign('id_rk')->references('id')->on('rencana_kerja')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kerja');
    }
};
