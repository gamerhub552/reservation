<?php

namespace App\Http\Controllers;

use App\Models\HotelUser;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;


class AuthController extends Controller
{

    public function displayHotelMenuOnHome()
{
    $mains = Service::where('service_sub_type', 'main')->get();
    $desserts = Service::where('service_sub_type', 'dessert')->get();
    $drinks = Service::where('service_sub_type', 'drink')->get();

    
    return view('hotel.hotelhome', compact('mains', 'desserts', 'drinks'));
}
    
    public function displayHotelHome()
    {
        // Fetch all rooms from the database
        $rooms = Room::all();
    
        // Return the 'hotel.rooms' view with the rooms data
        return view('hotel.hotelhome', compact('rooms'));
    }

    public function showProfile()
    {
        return view('hotel.hotelprofile');
    }
    
    public function login()
    {
        return view("hotelhome");
    }

    function loginPost(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route("hotel.hotelhome"));
        }

        return redirect(route("login"))
            ->with("error", "Login failed");
    }

public function logout()
{
    Auth::logout();
    return redirect(route('login'))->with('success', 'Logged out successfully');
}



    function register()
    {
        return view("auth.register");
    }

    function registerPost(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect(route("login"))
                ->with("success", "User created successfully");
        }

        return redirect(route("register"))
            ->with("error", "Failed to create account");
    }

    function admin()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with("error", "Please login first!");
        }

        return view('/dashboard');
    }}

    