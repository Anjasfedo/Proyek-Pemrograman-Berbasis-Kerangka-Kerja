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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('author_name'); // Column for author name
            $table->string('pen_name')->nullable(); // Column for pen name (optional)
            $table->enum('gender', ['Male', 'Female']); // Column for gender
            $table->date('date_of_birth'); // Column for date of birth
            $table->string('place_of_birth'); // Column for place of birth
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
