@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">

    <h1 class="text-2xl font-bold mb-6">➕ Add New Room</h1>

    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold">Room Name</label>
            <input type="text" name="room_name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" required>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Room Type</label>
                <input type="text" name="room_type" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold">Room Count</label>
                <input type="number" name="room_count" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Room Numbers (comma-separated)</label>
            <textarea name="room_numbers" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Rate (₱)</label>
                <input type="number" step="0.01" name="room_rate" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold">Capacity</label>
                <input type="number" name="capacity" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Room Description</label>
            <textarea name="room_description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Room Front Image</label>
            <input type="file" name="room_front_image" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold">Additional Room Images</label>
            <input type="file" name="room_images[]" class="w-full border rounded px-3 py-2" multiple>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                Save Room
            </button>
        </div>

    </form>
</div>
@endsection
