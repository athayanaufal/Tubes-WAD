<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('dokter'))
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter', 100);
            $table->string('spesialisasi', 50);
            $table->string('nip_dokter', 18)->unique();
            $table->string('jenis_kelamin', 10);
            $table->string('no_telepon', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_dokter');
    }
};
