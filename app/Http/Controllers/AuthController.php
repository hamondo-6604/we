<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Landing page
    public function landing()
    {
        // Get dynamic data for the home page
        $featuredRoutes = \App\Models\BusRoute::with(['originCity', 'destinationCity'])
            ->where('status', 'active')
            ->take(6)
            ->get();
            
        $upcomingTrips = \App\Models\Trip::with(['route.originCity', 'route.destinationCity', 'bus', 'driver'])
            ->where('status', 'scheduled')
            ->where('trip_date', '>=', now()->format('Y-m-d'))
            ->orderBy('trip_date', 'asc')
            ->orderBy('departure_time', 'asc')
            ->take(10)
            ->get();
            
        $ongoingTrips = \App\Models\Trip::with(['route.originCity', 'route.destinationCity', 'bus', 'driver'])
            ->where('status', 'ongoing')
            ->orderBy('trip_date', 'desc')
            ->orderBy('departure_time', 'desc')
            ->take(3)
            ->get();
            
        // Get cities that have actual routes between them
        $originCities = \App\Models\BusRoute::with('originCity')
            ->where('status', 'active')
            ->get()
            ->pluck('originCity.name')
            ->unique()
            ->sort()
            ->values();
            
        $destinationCities = \App\Models\BusRoute::with('destinationCity')
            ->where('status', 'active')
            ->get()
            ->pluck('destinationCity.name')
            ->unique()
            ->sort()
            ->values();
            
        $stats = [
            'totalCities' => \App\Models\City::where('status', 'active')->count(),
            'totalRoutes' => \App\Models\BusRoute::where('status', 'active')->count(),
            'activeBuses' => \App\Models\Bus::where('status', 'active')->count(),
            'totalTrips' => \App\Models\Trip::count(),
            'todayTrips' => \App\Models\Trip::whereDate('trip_date', now()->format('Y-m-d'))->count(),
        ];
        
        return view('landing.home', compact('featuredRoutes', 'upcomingTrips', 'ongoingTrips', 'stats', 'originCities', 'destinationCities'));
    }

    // Ticket booking page
    public function ticketBooking()
    {
        return view('landing.ticket_booking');
    }

    //Routes booking page
    public function routesBooking(){
        return view('landing.booking_routes');
    }

    // Manage bookings page
    public function manageBookings(){
        return view('landing.manage_booking');
    }

    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Show registration form
    public function register()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new customer user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',   // default role
            'status' => 'active',   // default status
        ]);

        // Check if request is AJAX (from modal)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful! You can now log in.'
            ]);
        }

        return redirect()->route('login')->with('success', 'Registration Successful!');
    }

    // Handle login
    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember ?? false)) {
            $user = Auth::user();

            // Check if user is blocked
            if ($user->status === 'blocked') {
                Auth::logout();
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Your account is blocked.'
                    ]);
                }
                
                return redirect()->back()->with('error', 'Your account is blocked.');
            }

            // Check if request is AJAX (from modal)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => $user->role === 'admin' ? route('admin.dashboard') : route('landing.home')
                ]);
            }

            // Redirect based on role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'customer':
                    return redirect()->route('landing.home');
                case 'driver':
                    return redirect()->route('driver.dashboard'); // future route
                default:
                    Auth::logout();
                    return redirect('/')->with('error', 'Role not recognized.');
            }
        }

        // Check if request is AJAX (from modal)
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.'
            ]);
        }

        return redirect()->back()->with('error', 'Invalid Credentials.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Handle forgot password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Here you would typically send a password reset email
        // For now, we'll just return a success response
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Password reset link has been sent to your email address.'
            ]);
        }

        return back()->with('success', 'Password reset link sent!');
    }
}
