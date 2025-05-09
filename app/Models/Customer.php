<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_fname', // Add this field
        'customer_lname', // Add any other necessary fields
        'age',
        'phone',
        'license_id',
        'valid_id',
        'address',
    ];
}
