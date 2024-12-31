<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama dokter
            $table->string('spesialisasi'); // Spesialisasi dokter
            $table->enum('ketersediaan', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia'); // Status ketersediaan
            $table->string('gambar')->nullable(); // URL gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokters');
    }
};
