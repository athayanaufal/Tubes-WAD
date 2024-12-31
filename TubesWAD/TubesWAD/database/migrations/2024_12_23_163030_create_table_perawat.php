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
        Schema::create('perawat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perawat', 100);
            $table->string('nip_perawat', 18)->unique();
            $table->string('jenis_kelamin', 10);
            $table->string('no_telepon', 15)->nullable();
            $table->string('alamat', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_perawat');
    }
};
