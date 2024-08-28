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
        //
        Schema::create('automoviles', function (Blueprint $table) {
            $table->id("Auto_id"); // Creates an auto-incrementing primary key
            $table->string('Auto_Name'); // Example column
            $table->string('Auto_Modelo'); // Example column
            $table->string('Auto_Marca'); // Example column
            $table->string('Auto_Pais'); // Example column
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
