<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Landing
Route::get('/', [AuthController::class, 'landing'])->name('landing.home');

// Ticket Booking
Route::get('/ticket-booking', [AuthController::class, 'ticketBooking'])->name('landing.ticket_booking');

//Route Booking
Route::get('/booking-routes', [AuthController::class, 'routesBooking'])->name('landing.booking_routes');

// Admin Dashboard (admin users only)
Route::middleware('auth')->group(function () {
  Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Manage Bookings (authenticated users only)
Route::middleware('auth')->group(function () {
  Route::get('/manage-bookings', [AuthController::class, 'manageBookings'])->name('manage.bookings');
});

// Authentication routes (API only for modals)
Route::post('/login_post', [AuthController::class, 'login_post'])->name('login_post');
Route::post('/register_post', [AuthController::class, 'register_post'])->name('register_post');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');

// Logout (authenticated users)
Route::middleware('auth')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
