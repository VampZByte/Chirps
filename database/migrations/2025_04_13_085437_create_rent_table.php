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
            
            $table->string('fuel_policy')->nullable();
            $table->decimal('fuel_service_fee', 10, 2)->nullable();
            $table->string('authorized_driver')->nullable();
            $table->string('authorized_driver_license')->nullable();

            $table->boolean('insurance_covered')->nullable();
            $table->boolean('insurance_renter_pays')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->text('insurance_coverage')->nullable();
            
            $table->decimal('late_fee', 10, 2)->nullable();
            $table->string('owner_signature')->nullable();
            $table->date('owner_date')->nullable();
            $table->string('renter_signature')->nullable();
            $table->date('renter_date')->nullable();

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
