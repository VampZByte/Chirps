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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('Payment_ID'); // Primary key
            $table->unsignedBigInteger('Customer_ID'); // Foreign key
            $table->unsignedBigInteger('Rent_ID'); // Foreign key
            $table->decimal('Amount_Paid', 10,2);
            $table->date('Payment_Date');
            $table->string('Payment_Method');
            $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

