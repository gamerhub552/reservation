<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Manage Rooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
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
            <a href="{{ url('/rooms') }}" class="block px-4 py-3 rounded-md bg-blue-100 text-blue-800 font-medium">
                🏨 Manage Rooms
            </a>
            <a href="{{ url('/services') }}" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-green-100 hover:text-green-800 font-medium transition">
                🛎️ Manage Services
            </a>
            <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-yellow-100 hover:text-yellow-800 font-medium transition">
                📈 Sales Report
            </a>
            <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-purple-100 hover:text-purple-800 font-medium transition">
                📄 Reservation Report
            </a>
            <a href="/website" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-gray-200 hover:text-black font-medium transition">
                🌐 Manage Website
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">🏨 Manage Rooms</h1>
            <a href="{{ route('rooms.create') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-md shadow hover:bg-blue-700 transition">
                ➕ Add Room
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 border-b text-gray-600 font-semibold text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">Room Name</th>
                        <th class="px-6 py-3 text-left">Type</th>
                        <th class="px-6 py-3 text-left">Count</th>
                        <th class="px-6 py-3 text-left">Rate</th>
                        <th class="px-6 py-3 text-left">Capacity</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($rooms as $room)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $room->room_name }}</td>
                        <td class="px-6 py-4">{{ $room->room_type ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $room->room_count ?? '0' }}</td>
                        <td class="px-6 py-4">₱{{ number_format($room->room_rate, 2) }}</td>
                        <td class="px-6 py-4">{{ $room->capacity ?? '-' }}</td>
                        <td class="px-6 py-4">
    <div class="flex space-x-2">
        <a href="{{ route('rooms.show', $room->id) }}" class="text-blue-600 hover:underline">View</a>
        <a href="{{ route('rooms.edit', $room->id) }}" class="text-yellow-600 hover:underline">Edit</a>
        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Delete</button>
        </form>
    </div>
</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</div>

</body>
</html>
