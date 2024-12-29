<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToKonsulTable extends Migration
{
    public function up(): void
    {
        Schema::table('konsul', function (Blueprint $table) {
            $table->boolean('status')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('konsul', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
