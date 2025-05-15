<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Manage Rooms')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-screen overflow-hidden bg-gray-100 text-gray-800">

<div class="h-full flex">

    <aside class="w-64 bg-white shadow-lg h-full overflow-y-auto">
        <div class="p-6 text-xl font-bold border-b border-gray-200">
            🏢 Hotel Admin
        </div>
        <nav class="mt-6 space-y-2 px-4">
            <a href="{{ url('/rooms') }}" class="block px-4 py-3 rounded-md {{ request()->is('rooms*') ? 'bg-blue-100 text-blue-800 font-medium' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-800' }}">
                🏨 Manage Rooms
            </a>
            <a href="{{ url('/services') }}" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-green-100 hover:text-green-800 font-medium">
                🛎️ Manage Services
            </a>
            <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-yellow-100 hover:text-yellow-800 font-medium">
                📈 Sales Report
            </a>
            <a href="#" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-purple-100 hover:text-purple-800 font-medium">
                📄 Reservation Report
            </a>
            <a href="/website" class="block px-4 py-3 rounded-md text-gray-700 hover:bg-gray-200 hover:text-black font-medium">
                🌐 Manage Website
            </a>
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto p-10">
        @yield('content')
    </main>

</div>

</body>
</html>
