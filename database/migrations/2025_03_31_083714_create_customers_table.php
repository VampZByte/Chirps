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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_fname');
            $table->string('customer_lname');
            $table->string('age');
            $table->string('phone');
            $table->string('license_id');
            $table->string('valid_id');
            $table->string('address');
            $table->timestamps();
            $table->boolean('is_archived')->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
