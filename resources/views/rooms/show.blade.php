@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg mt-10">
    <h1 class="text-2xl font-bold mb-6">🛏️ Room: {{ $room->room_name }}</h1>

    <p><strong>Type:</strong> {{ $room->room_type ?? '-' }}</p>
    <p><strong>Count:</strong> {{ $room->room_count ?? '0' }}</p>
    <p><strong>Numbers:</strong> 
        @if(is_array($room->room_numbers))
            {{ implode(', ', $room->room_numbers) }}
        @else
            {{ $room->room_numbers }}
        @endif
    </p>
    <p><strong>Rate:</strong> ₱{{ number_format($room->room_rate, 2) }}</p>
    <p><strong>Capacity:</strong> {{ $room->capacity }}</p>
    <p><strong>Description:</strong> {{ $room->room_description }}</p>

    @if($room->room_front_image)
        <div class="mt-4">
            <h2 class="font-semibold mb-2">Front Image</h2>
            <img src="{{ asset('storage/' . $room->room_front_image) }}" class="h-48 rounded shadow">
        </div>
    @endif

    @if($room->room_images)
        <div class="mt-6">
            <h2 class="font-semibold mb-2">Gallery</h2>
            <div class="flex gap-4">
                @foreach(json_decode($room->room_images) as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="h-24 rounded shadow">
                @endforeach
            </div>
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('rooms.edit', $room->id) }}" class="text-yellow-600 hover:underline mr-4">Edit</a>
        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this room?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Delete</button>
        </form>
    </div>
</div>
@endsection
