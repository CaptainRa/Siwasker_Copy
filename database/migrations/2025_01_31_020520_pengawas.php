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
        Schema::create('pengawas', function (Blueprint $table){
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('nama')->references('name')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawas');
    }
};
