@extends('layouts.dashboard')

@section('content')
<!-- Page Title -->
<div class="mb-10">
    <h1 class="text-4xl font-bold text-gray-900">📄 Reservation Report - {{ now()->format('F Y') }}</h1>
    <p class="text-gray-500 mt-2">View reservations and bookings summary for the current month.</p>
</div>

<!-- Bookings per Room Type Chart -->
<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-semibold mb-4">📊 Bookings per Room Type</h2>
    <canvas id="roomTypeChart" height="100"></canvas>
</div>

<!-- ✅ Total Reservations This Month -->
<p class="mb-4 text-lg font-semibold text-gray-800">
    📌 Total Reservations This Month: <span class="text-blue-600">{{ $totalReservations }}</span>
</p>

<!-- Monthly Reservations Table -->
<div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
    <h2 class="text-2xl font-semibold mb-4">📅 This Month's Reservations</h2>
    <table class="min-w-full border-collapse table-auto">
        <thead class="bg-gray-100 border-b-2 border-gray-300">
            <tr>
                <th class="text-left p-4 font-semibold text-gray-700">Guest Name</th>
                <th class="text-left p-4 font-semibold text-gray-700">Room Type</th>
                <th class="text-left p-4 font-semibold text-gray-700">Room Number</th> <!-- new column -->
                <th class="text-left p-4 font-semibold text-gray-700">Check-In</th>
                <th class="text-left p-4 font-semibold text-gray-700">Check-Out</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($monthlyReservations as $res)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">{{ $res->guest_name }}</td>
                <td class="p-4">{{ $res->room_type }}</td>
                <td class="p-4">{{ $res->room_number }}</td> <!-- display room number -->
                <td class="p-4">{{ \Carbon\Carbon::parse($res->checkin_date)->format('M d, Y') }}</td>
                <td class="p-4">{{ \Carbon\Carbon::parse($res->checkout_date)->format('M d, Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">No reservations found for this month.</td>
            </tr>
            @endforelse
        </tbody>

    </table>
</div>

<script>
    const roomTypeLabels = JSON.parse('@json($roomTypeLabels)');
    const roomTypeData = JSON.parse('@json($roomTypeData)');




    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('roomTypeChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: roomTypeLabels,
                datasets: [{
                    label: 'Room Type Bookings',
                    data: roomTypeData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection