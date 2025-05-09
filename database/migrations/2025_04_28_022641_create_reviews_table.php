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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Customer_ID'); // Foreign key
            $table->unsignedBigInteger('Car_ID');
            $table->unsignedBigInteger('Rent_ID'); // Foreign key
            $table->string('Rating');
            $table->string('Feedback');
            $table->date('Review_Date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
