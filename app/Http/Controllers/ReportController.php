<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function reservationReport()
    {
        // Define the current month's start and end dates
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        // Get all bookings overlapping this month, joined with rooms and users (guests)
        $monthlyReservations = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->select(
                'bookings.id',
                'users.name as guest_name',
                'rooms.room_type as room_type',
                'bookings.room_number',
                'bookings.checkin_date',
                'bookings.checkout_date'
            )
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->where('bookings.checkin_date', '<=', $endOfMonth)
                    ->where(function ($q) use ($startOfMonth) {
                        $q->where('bookings.checkout_date', '>=', $startOfMonth)
                            ->orWhereNull('bookings.checkout_date');
                    });
            })
            ->orderBy('bookings.checkin_date', 'asc')
            ->get();


        // Aggregate bookings count per room type for the chart
        $roomBookings = DB::table('bookings')
            ->join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->select('rooms.room_type as room_type', DB::raw('COUNT(*) as total_bookings'))
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->where(function ($q) use ($startOfMonth, $endOfMonth) {
                    $q->where('bookings.checkin_date', '<=', $endOfMonth)
                        ->where(function ($q2) use ($startOfMonth) {
                            $q2->where('bookings.checkout_date', '>=', $startOfMonth)
                                ->orWhereNull('bookings.checkout_date');
                        });
                });
            })
            ->groupBy('rooms.room_type')
            ->get();



        // Calculate total reservations this month
        $totalReservations = DB::table('bookings')
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('checkin_date', [$startOfMonth, $endOfMonth])
                    ->orWhereBetween('checkout_date', [$startOfMonth, $endOfMonth])
                    ->orWhere(function ($query) use ($startOfMonth, $endOfMonth) {
                        $query->where('checkin_date', '<=', $startOfMonth)
                            ->where(function ($q) use ($endOfMonth) {
                                $q->where('checkout_date', '>=', $endOfMonth)
                                    ->orWhereNull('checkout_date');
                            });
                    })
                    ->orWhereNull('checkout_date');
            })
            ->count();


        // Prepare labels and data arrays for Chart.js
        $roomTypeLabels = $roomBookings->pluck('room_type')->toArray();
        $roomTypeData = $roomBookings->pluck('total_bookings')->toArray();

        // Return the view with the data including total reservations
        return view('ReservationReport.reservation-report', compact(
            'monthlyReservations',
            'roomTypeLabels',
            'roomTypeData',
            'totalReservations'
        ));
    }
}
