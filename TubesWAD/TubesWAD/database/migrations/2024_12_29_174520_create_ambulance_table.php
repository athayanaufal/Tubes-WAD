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
        // Check if 'ambulances' table exists before attempting to alter it.
        if (Schema::hasTable('ambulances')) {
            Schema::table('ambulances', function (Blueprint $table) {
                $table->string('kode_mobil')->unique()->after('nip_supir'); 
                $table->foreignId('nik_pasien')->nullable()->constrained('patients')->onDelete('set null');
            });
        }

        // Create the 'notifications' table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('nip_supir')->constrained('users')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Modify the 'ambulances' table by removing the columns added
        if (Schema::hasTable('ambulances')) {
            Schema::table('ambulances', function (Blueprint $table) {
                $table->dropForeign(['nik_pasien']); // Drop the foreign key constraint
                $table->dropColumn('nik_pasien');    // Drop the 'nik_pasien' column
                $table->dropColumn('kode_mobil');    // Drop the 'kode_mobil' column
            });
        }

        // Drop the 'notifications' table
        Schema::dropIfExists('notifications');
    }
};
