<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = ['model', 'brand', 'year', 'rental_price', 'availability_status', 'car_condition'];
}