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
        // Check if the 'notifications' table already exists
        if (!Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->string('pesan'); 
                $table->string('type')->nullable(); 
                
                // Polymorphic relation
                $table->morphs('notifiable');
                
                $table->timestamps(); 
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'notifications' table if it exists
        if (Schema::hasTable('notifications')) {
            Schema::dropIfExists('notifications');
        }
    }
};
