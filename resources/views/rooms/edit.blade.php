@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">

    <h1 class="text-2xl font-bold mb-6">✏️ Edit Room: {{ $room->room_name }}</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') 

        <div>
            <label class="block font-semibold">Room Name</label>
            <input type="text" name="room_name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="{{ old('room_name', $room->room_name) }}" required>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Room Type</label>
                <input type="text" name="room_type" class="w-full border rounded px-3 py-2" value="{{ old('room_type', $room->room_type) }}">
            </div>
            <div>
                <label class="block font-semibold">Room Count</label>
                <input type="number" name="room_count" class="w-full border rounded px-3 py-2" value="{{ old('room_count', $room->room_count) }}">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Room Numbers (comma-separated)</label>
            <textarea name="room_numbers" class="w-full border rounded px-3 py-2">{{ old('room_numbers', implode(',', $room->room_numbers ?? [])) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold">Rate (₱)</label>
                <input type="number" step="0.01" name="room_rate" class="w-full border rounded px-3 py-2" value="{{ old('room_rate', $room->room_rate) }}">
            </div>
            <div>
                <label class="block font-semibold">Capacity</label>
                <input type="number" name="capacity" class="w-full border rounded px-3 py-2" value="{{ old('capacity', $room->capacity) }}">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Room Description</label>
            <textarea name="room_description" class="w-full border rounded px-3 py-2">{{ old('room_description', $room->room_description) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Room Front Image</label>
            <input type="file" name="room_front_image" class="w-full border rounded px-3 py-2">
            @if($room->room_front_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $room->room_front_image) }}" alt="Room Front Image" class="max-w-xs">
                </div>
            @endif
        </div>

        <div>
            <label class="block font-semibold">Additional Room Images</label>
            <input type="file" name="room_images[]" class="w-full border rounded px-3 py-2" multiple>
            @if($room->room_images)
                <div class="mt-2">
                    @foreach(json_decode($room->room_images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Room Image" class="max-w-xs">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                Update Room
            </button>
        </div>

    </form>
</div>
@endsection
