<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function displayHotelHome()
    {
        // Fetch all rooms from the database
        $rooms = Room::all();
        
        // Fetch services based on sub_type
        $mains = Service::where('service_sub_type', 'main')->get();
        $desserts = Service::where('service_sub_type', 'dessert')->get();
        $drinks = Service::where('service_sub_type', 'drink')->get();
    
        // Pass all data to the view
        return view('hotel.hotelhome', compact('rooms', 'mains', 'desserts', 'drinks'));
    }
}
