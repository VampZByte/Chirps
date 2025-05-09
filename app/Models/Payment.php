<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments'; // Your actual table name
    protected $primaryKey = 'Payment_ID'; // Custom primary key

    public $timestamps = false; // Disable timestamps if your table doesn't use them

    protected $fillable = [
        'Customer_ID',
        'Rent_ID',
        'Amount_Paid',
        'Payment_Date',
        'Payment_Method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Car
    public function rent()
    {
        return $this->belongsTo(Cars::class, 'Rent_ID', 'id');
    }

    // Relationship with User
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID');
    }
}
