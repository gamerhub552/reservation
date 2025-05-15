<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;



Route::get('/room1', [RoomController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/payment', function () {
    return view('payment');
});

// Logout route to log the user out
Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'))->with('success', 'Logged out successfully');
});

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");

// Password reset route (make sure password reset views are correctly configured)
Route::get('password/reset', [AuthController::class, "password.request"])->name('password.request');

// Admin dashboard route (protected by 'auth' middleware)
Route::middleware("auth")->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, "admin"])->name("admin.dashboard");

    // Customer dashboard (or 'landing' page) route
    Route::get('/landing', function () {
        return view('landing'); // This is the customer dashboard page
    })->name('customer.dashboard'); // Protect it with 'auth' middleware, only accessible when logged in
});
