<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 5 rute unggulan yang aktif
        $featuredRoutes = BusRoute::with(['origin', 'destination', 'bus'])
            ->featured()
            ->where('departure_time', '>', now())
            ->orderBy('departure_time')
            ->limit(5)
            ->get();

        return view('home', compact('featuredRoutes'));
    }
}