<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name',
        'room_type',
        'room_count',
        'room_numbers',
        'room_rate',
        'capacity',
        'room_description',
        'room_front_image',
        'room_images',
    ];

    protected $casts = [
        'room_numbers' => 'array',      // Treat room_numbers as array
        'room_images' => 'array',       // Optional: if saving multiple images
    ];

    // A Room has many Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
