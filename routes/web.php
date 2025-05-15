<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController; // Make sure to import your AdminController

// ---------------------------
// Admin Pages and Dashboard
// ---------------------------

Route::view('/dashboard', 'dashboard');
Route::get('/website', function () {
    return view('website.index');
});
Route::get('/websitehome', function () {
    return view('website.websitehome');
});
Route::get('/websiterooms', function () {
    return view('website.websiterooms');
});
Route::get('/websiteservices', function () {
    return view('website.websiteservices');
});
Route::get('/websiteprofile', function () {
    return view('website.websiteprofile');
});
Route::get('/websiteabout', function () {
    return view('website.websiteabout');
});
Route::get('/websitecontact', function () {
    return view('website.websitecontact');
});
Route::get('/websitecontact', function () {
    return view('website.websitecontact');
});


// ---------------------------
// Authentication Routes
// ---------------------------
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");
Route::get('password/reset', [AuthController::class, "password.request"])->name('password.request');

// ---------------------------
// Hotel-Specific Views
// ---------------------------
Route::get('/hotelhome', [HomeController::class, "displayHotelHome"])->name('hotel.hotelhome');
Route::get('/hotelprofile', [ProfileController::class, 'showProfile'])->name('hotel.hotelprofile');
Route::get('/hotelrooms', [RoomController::class, 'displayHotelRooms'])->name('hotel.rooms');
Route::get('/hotelservices', [ServiceController::class, 'displayHotelServices'])->name('hotel.services');
Route::get('/hotelservices', [ServiceController::class, 'displayHotelMenu'])->name('hotel.menu');

// ---------------------------
// Room and Service Resources
// ---------------------------
Route::resource('rooms', RoomController::class);
Route::resource('services', ServiceController::class);

// ---------------------------
// Booking Routes
// ---------------------------
Route::post('/hotelrooms/{room_id}/book', [BookingController::class, 'store'])->name('hotel.booking.store');

// ---------------------------
// Order Routes
// ---------------------------
Route::get('/order/confirm/{id}', [ServiceController::class, 'confirm'])->name('order.confirm');
Route::post('/order/submit', [ServiceController::class, 'orderService'])->name('order.submit');

// ---------------------------
// Dashboard Routes
// ---------------------------
Route::prefix('dashboard')->group(function () {
    Route::get('/rooms', [RoomController::class, 'dashboardIndex'])->name('dashboard.rooms');
});


// ---------------------------
// Authenticated (Logged-In) Routes
// ---------------------------
Route::middleware('auth')->group(function () {
    Route::get('/room', fn() => view('room'));
    Route::get('/payment', fn() => view('payment'));
    Route::get('/contacts', fn() => view('contacts'));
    Route::get('/about', fn() => view('about'));
    Route::get('/profile', fn() => view('profile'));

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('bookings', BookingController::class);
});

Route::get('/reservation-report', [ReportController::class, 'reservationReport'])->name('dashboard.reservation.report');
