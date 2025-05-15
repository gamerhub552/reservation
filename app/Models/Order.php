<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'service_id',
        'customer_name',
        'quantity',
        'total_price',
        'booking_id',
    ];

    // Relationship with the Service model
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
