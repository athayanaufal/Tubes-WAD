<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRujukanTerdekatTable extends Migration
{
    public function up()
    {
        Schema::create('rujukan terdekat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->string('jenis_layanan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rujukan');
    }
}