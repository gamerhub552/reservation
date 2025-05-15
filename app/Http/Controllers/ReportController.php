<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function reservationReport()
    {
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        // Get all reservations for the current month
        $monthlyReservations = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->select(
                'bookings.id',
                'bookings.guest_name',
                'rooms.room_type as room_type',
                'bookings.checkin_date',
                'bookings.checkout_date'
            )
            ->whereMonth('bookings.checkin_date', $month)
            ->whereYear('bookings.checkin_date', $year)
            ->orderBy('bookings.checkin_date', 'asc')
            ->get();

        // Count how many bookings per room type
        $roomBookings = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->select('rooms.room_type as room_type', DB::raw('COUNT(*) as total_bookings'))
            ->whereMonth('bookings.checkin_date', $month)
            ->whereYear('bookings.checkin_date', $year)
            ->groupBy('rooms.room_type')
            ->get();

        $roomTypeLabels = $roomBookings->pluck('room_type');
        $roomTypeData = $roomBookings->pluck('total_bookings');

        return view('dashboard.reservation-report', [
            'monthlyReservations' => $monthlyReservations,
            'roomTypeLabels' => json_encode($roomTypeLabels),
            'roomTypeData' => json_encode($roomTypeData),
        ]);
    }
}
