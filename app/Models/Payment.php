<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments'; // Your actual table name
    protected $primaryKey = 'Payment_ID'; // Custom primary key
    public $timestamps = false;

    protected $fillable = [
        'Customer_ID',
        'Rent_ID',
        'Amount_Paid',
        'Payment_Date',
        'Payment_Method',
        'is_archived'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rent()
    {
        return $this->belongsTo(Cars::class, 'Rent_ID', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID');
    }
}
