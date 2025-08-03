<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalBuses' => Bus::count(),
            'totalRoutes' => BusRoute::count(),
            'recentBookings' => Booking::with(['user', 'busRoute'])
                ->latest()
                ->limit(10)
                ->get(),
            'revenue' => Booking::completed()->sum('total_price')
        ]);
    }

    public function bookings()
    {
        return view('admin.bookings.index', [
            'bookings' => Booking::with(['user', 'busRoute'])
                ->latest()
                ->paginate(20)
        ]);
    }
}