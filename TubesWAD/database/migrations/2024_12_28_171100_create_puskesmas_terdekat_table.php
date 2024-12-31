<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuskesmasTerdekatTable extends Migration
{
    public function up()
    {
        Schema::create('puskesmas_terdekat', function (Blueprint $table) {  
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('telepon')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puskesmas_terdekat');  
    }
}
