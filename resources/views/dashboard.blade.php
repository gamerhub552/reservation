<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex">

        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6 text-xl font-bold border-b border-gray-200">
                🏢 Hotel Admin
            </div>
            <nav class="mt-6 space-y-2 px-4">
                <a href="{{ url('/rooms') }}" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-blue-100 hover:text-blue-800 font-medium transition">
                    🏨 Manage Rooms
                </a>
                <a href="/services" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-green-100 hover:text-green-800 font-medium transition">
                    🛎️ Manage Services
                </a>
                <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-yellow-100 hover:text-yellow-800 font-medium transition">
                    📈 Sales Report
                </a>
                @auth
                <a href="{{ route('reservation.report') }}" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-purple-100 hover:text-purple-800 font-medium transition">
                    📄 Reservation Report
                </a>


                @endauth

                <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-gray-200 hover:text-black font-medium transition">
                    🌐 Manage Website
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-4">Welcome, Admin</h1>
            <p class="text-gray-600">Use the sidebar to manage rooms, services, reports, and more.</p>

            <div class="mt-10">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-2">Dashboard Overview</h2>
                    <p class="text-sm text-gray-500">This space can show summary cards like total rooms, active bookings, or recent activity.</p>
                </div>
            </div>
        </main>
    </div>

</body>

</html>