<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'guests' => 'required|integer|min:1',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Find the room or fail
        $room = Room::findOrFail($validatedData['room_id']);

        // Ensure room_numbers is an array (cast in Room model)
        $roomNumbers = $room->room_numbers ?? [];
        if (!is_array($roomNumbers)) {
            $roomNumbers = json_decode($room->room_numbers, true) ?? [];
        }

        // Get room numbers already booked during the requested period
        $bookedRoomNumbers = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('checkin_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                    ->orWhereBetween('checkout_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                    ->orWhere(function ($query) use ($validatedData) {
                        $query->where('checkin_date', '<=', $validatedData['checkin_date'])
                            ->where('checkout_date', '>=', $validatedData['checkout_date']);
                    });
            })
            ->pluck('room_number')
            ->toArray();

        // Find available room numbers by excluding booked ones
        $availableRoomNumbers = array_diff($roomNumbers, $bookedRoomNumbers);

        if (empty($availableRoomNumbers)) {
            return redirect()->back()->withErrors(['no_available_room' => 'No available room numbers for this room during the selected dates.'])->withInput();
        }

        // Assign the first available room number
        $assignedRoomNumber = array_values($availableRoomNumbers)[0];

        // Calculate the number of nights and payment amount
        $checkinDate = Carbon::parse($validatedData['checkin_date']);
        $checkoutDate = Carbon::parse($validatedData['checkout_date']);
        $nights = $checkinDate->diffInDays($checkoutDate);
        $paymentAmount = $room->room_rate * $nights;

        // Prevent overlapping bookings for the same user and room
        $overlap = Booking::where('room_id', $room->id)
            ->where('user_id', Auth::id())
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('checkin_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                    ->orWhereBetween('checkout_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                    ->orWhere(function ($query) use ($validatedData) {
                        $query->where('checkin_date', '<=', $validatedData['checkin_date'])
                            ->where('checkout_date', '>=', $validatedData['checkout_date']);
                    });
            })->exists();

        if ($overlap) {
            return redirect()->back()->withErrors(['overlap' => 'You already have a booking that overlaps with these dates.'])->withInput();
        }

        // Create the booking record
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'room_number' => $assignedRoomNumber,
            'checkin_date' => $validatedData['checkin_date'],
            'checkout_date' => $validatedData['checkout_date'],
            'guests' => $validatedData['guests'],
            'payment_status' => 'pending',
            'payment_amount' => $paymentAmount,
        ]);

        // Store booking id in session for possible future use (like payment)
        session(['booking_id' => $booking->id]);

        return redirect()->route('hotel.hotelprofile')->with('success_booking', 'Booking successfully created!');
    }
}
