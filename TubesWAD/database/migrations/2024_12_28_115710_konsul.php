<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konsul', function (Blueprint $table) {
            $table->id();
            $table->string('nip_dokter')->constrained('dokter')->onDelete('cascade');
            $table->string('nama_pasien');
            $table->string('nomor_telepon_pasien');
            $table->dateTime('waktu_janji');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsul');
    }
};
