<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This function sets up the 'cars' table structure in the database.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key for the cars table
            $table->string('model'); // Car model name
            // $table->unsignedBigInteger('manufacturer_id'); // Foreign key to manufacturers table (currently commented out)
            $table->string('type'); // Type of car (e.g., Golf R)
            $table->integer('year'); // Year the car was manufactured
            $table->string('image_url')->nullable(); // URL for the car's image, nullable if no image is provided
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key constraint (commented out):
            // $table->foreign('manufacturer_id')->references('id')->on('manufacturers')
            //                                     ->onUpdate('cascade')
            //                                     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * This function drops the 'cars' table, effectively rolling back the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
