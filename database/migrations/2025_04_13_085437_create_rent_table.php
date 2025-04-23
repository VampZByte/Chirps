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
        Schema::create('rent', function (Blueprint $table) {
            $table->id('Rent_ID'); // Primary key
            $table->unsignedBigInteger('Customer_ID'); // Foreign key
            $table->unsignedBigInteger('Car_ID'); // Foreign key
            $table->date('Rent_Date');
            $table->date('Return_Date')->nullable(); // Optional in case car not yet returned
            $table->decimal('Total_Price', 10, 2);
            $table->string('Status');
            $table->timestamps();

            // Foreign key constraints (optional, if customers and cars tables exist)
            $table->foreign('Customer_ID')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('Car_ID')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
