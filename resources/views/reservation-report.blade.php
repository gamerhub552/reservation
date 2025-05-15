<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservation Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100 p-10 font-sans">

    <h1 class="text-3xl font-bold mb-6">📄 Reservation Report - {{ now()->format('F Y') }}</h1>

    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">📊 Bookings per Room Type</h2>
        <canvas id="roomTypeChart" height="100"></canvas>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">📅 This Month's Reservations</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Guest Name</th>
                    <th class="p-2 text-left">Room Type</th>
                    <th class="p-2 text-left">Check-In</th>
                    <th class="p-2 text-left">Check-Out</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($monthlyReservations as $res)
                <tr class="border-t">
                    <td class="p-2">{{ $res->guest_name }}</td>
                    <td class="p-2">{{ $res->room_type }}</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($res->checkin_date)->format('M d, Y') }}</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($res->checkout_date)->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No reservations found for this month.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        const roomTypeLabels = JSON.parse('{!! $roomTypeLabels !!}');
        const roomTypeData = JSON.parse('{!! $roomTypeData !!}');

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('roomTypeChart').getContext('2d');
            const myChart = new Chart(ctx, {
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
                        title: {
                            display: false,
                        },
                        legend: {
                            position: 'bottom',
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
</body>

</html>