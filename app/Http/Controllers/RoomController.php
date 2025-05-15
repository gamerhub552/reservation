<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function create()
    {
        return view('rooms.create');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function showRooms()
    {
        $rooms = Room::all();
        return view('/landing', compact('rooms'));
    }

    public function displayHotelRooms()
    {
        $rooms = Room::all();
        return view('hotel.hotelrooms', compact('rooms'));
    }

    public function displayHotelHome()
    {
        $rooms = Room::all();
        return view('hotel.hotelhome', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'nullable|string|max:255',
            'room_count' => 'nullable|integer',
            'room_numbers' => 'nullable|string', // comma-separated input
            'room_rate' => 'nullable|numeric',
            'capacity' => 'nullable|integer',
            'room_description' => 'nullable|string',
            'room_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'room_images' => 'nullable|array',
            'room_images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('room_front_image')) {
            $frontImagePath = $request->file('room_front_image')->store('room_images', 'public');
        }

        if ($request->hasFile('room_images')) {
            $images = [];
            foreach ($request->file('room_images') as $image) {
                $images[] = $image->store('room_images', 'public');
            }
        }

        Room::create([
            'room_name' => $request->room_name,
            'room_type' => $request->room_type,
            'room_count' => $request->room_count,
            'room_numbers' => isset($request->room_numbers)
                ? array_map('trim', explode(',', $request->room_numbers))
                : [],
            'room_rate' => $request->room_rate,
            'capacity' => $request->capacity,
            'room_description' => $request->room_description,
            'room_front_image' => isset($frontImagePath) ? $frontImagePath : null,
            'room_images' => isset($images) ? json_encode($images) : null,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room added successfully.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'room_name' => 'required|string|max:255',
            'room_type' => 'nullable|string|max:255',
            'room_count' => 'nullable|integer',
            'room_numbers' => 'nullable|string', // comma-separated input
            'room_rate' => 'nullable|numeric',
            'capacity' => 'nullable|integer',
            'room_description' => 'nullable|string',
            'room_front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'room_images' => 'nullable|array',
            'room_images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $room = Room::findOrFail($id);

        if ($request->hasFile('room_front_image')) {
            if ($room->room_front_image) {
                Storage::delete('public/' . $room->room_front_image);
            }
            $frontImagePath = $request->file('room_front_image')->store('room_images', 'public');
            $room->room_front_image = $frontImagePath;
        }

        if ($request->hasFile('room_images')) {
            $images = [];
            foreach ($request->file('room_images') as $image) {
                $images[] = $image->store('room_images', 'public');
            }

            if ($room->room_images) {
                $oldImages = json_decode($room->room_images);
                foreach ($oldImages as $oldImage) {
                    Storage::delete('public/' . $oldImage);
                }
            }

            $room->room_images = json_encode($images);
        }

        $room->update([
            'room_name' => $request->room_name,
            'room_type' => $request->room_type,
            'room_count' => $request->room_count,
            'room_numbers' => isset($request->room_numbers)
                ? array_map('trim', explode(',', $request->room_numbers))
                : [],
            'room_rate' => $request->room_rate,
            'capacity' => $request->capacity,
            'room_description' => $request->room_description,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
