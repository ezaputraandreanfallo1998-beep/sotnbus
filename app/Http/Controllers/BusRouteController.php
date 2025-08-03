<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    public function index()
    {
        return view('bus-routes.index', [
            'routes' => BusRoute::with(['bus', 'origin', 'destination'])
                ->orderBy('departure_time')
                ->paginate(10)
        ]);
    }

    public function show(BusRoute $busRoute)
    {
        return view('bus-routes.show', [
            'route' => $busRoute->load(['bus', 'origin', 'destination']),
            'availableSeats' => $busRoute->availableSeats()
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id|different:origin',
            'date' => 'required|date|after_or_equal:today',
            'passengers' => 'nullable|integer|min:1|max:10'
        ]);

        $routes = BusRoute::with(['bus', 'origin', 'destination'])
            ->where('origin_id', $validated['origin'])
            ->where('destination_id', $validated['destination'])
            ->whereDate('departure_time', '>=', $validated['date'])
            ->orderBy('departure_time')
            ->get();

        // Store search data in session for booking process
        session(['searchData' => $validated]);

        return view('bus-routes.search', [
            'routes' => $routes,
            'searchData' => $validated
        ]);
    }
}