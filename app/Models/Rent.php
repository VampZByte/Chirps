<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rent'; // Your actual table name
    protected $primaryKey = 'Rent_ID'; // Custom primary key

    public $timestamps = false; // Disable timestamps if your table doesn't use them

    protected $fillable = [
        'Customer_ID',
        'Car_ID',
        'Rent_Date',
        'Return_Date',
        'Total_Price',
        'Status',
    ];

    // Relationship with Car
    public function car()
    {
        return $this->belongsTo(Cars::class, 'Car_ID', 'Car_ID');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'Customer_ID', 'id');
    }
}
