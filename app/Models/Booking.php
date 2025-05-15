<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'room_id',
        'checkin_date',
        'checkout_date',
        'guests',
        'payment_status',
        'payment_amount',
        'room_number', // Storing the specific room number directly
    ];

    // Relationship: Booking belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Booking belongs to a Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Many-to-Many relationship with services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service', 'booking_id', 'service_id');
    }

    // One-to-Many relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
