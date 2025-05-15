<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_type',
        'service_sub_type',
        'price',
        'service_description',
        'service_front_image',
        'is_active',
    ];

    public function bookings()
{
    return $this->belongsToMany(Booking::class, 'booking_service');
}

public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
