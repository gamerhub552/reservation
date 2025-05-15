<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Order;

class ProfileController extends Controller
{
    public function ShowProfile()
    {
        $user = Auth::user();

        // Fetch bookings for the user with room details
$bookings = Booking::with(['room', 'orders.service']) // room and nested service in orders
    ->where('user_id', $user->id)
    ->orderBy('checkin_date', 'desc')
    ->get();

        // Fetch orders for the user
        $orders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Filter current booking (today is within check-in and check-out)
        $today = now()->toDateString();
        $currentBooking = $bookings->first(function ($booking) use ($today) {
            return $booking->checkin_date <= $today && $booking->checkout_date >= $today;
        });

        // Pass the data to the view
        return view('hotel.hotelprofile', compact('user', 'bookings', 'orders', 'currentBooking'));
    }
}
