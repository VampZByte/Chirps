<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rent';
    protected $primaryKey = 'Rent_ID';

    public $timestamps = false;

    protected $fillable = [
        'Customer_ID',
        'Car_ID',
        'Rent_Date',
        'Return_Date',
        'Total_Price',
        'Payment_Method',
        'Fuel_Policy',       // e.g., "Full-to-Full" or "Same Level"
        'Late_Fee',          // late fee per hour/day
        'Insurance_Provider',
        'Insurance_Coverage',
        'Status',            // e.g., "Active", "Returned", "Damaged"
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'Car_ID', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_ID');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'Rent_ID', 'Rent_ID');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

}
