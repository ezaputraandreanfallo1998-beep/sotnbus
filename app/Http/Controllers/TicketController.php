<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BusRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $searchData = session('searchData', []);

        if (empty($searchData)) {
            return redirect()->route('home')->with('error', 'Silakan cari tiket terlebih dahulu');
        }

        return view('tickets.index', [
            'searchData' => $searchData,
            'route' => BusRoute::findOrFail($searchData['route_id'] ?? null)
        ]);
    }

    public function book(Request $request)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:bus_routes,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:20',
            'seats' => 'required|array|min:1',
            'seats.*' => 'integer|exists:seats,id'
        ]);

        $searchData = session('searchData', []);
        $busRoute = BusRoute::findOrFail($validated['route_id']);

        // Create booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'bus_route_id' => $busRoute->id,
            'passenger_name' => $validated['passenger_name'],
            'passenger_phone' => $validated['passenger_phone'],
            'departure_date' => $searchData['date'],
            'total_passengers' => count($validated['seats']),
            'total_price' => $busRoute->price * count($validated['seats']),
            'status' => 'confirmed'
        ]);

        // Attach seats
        $booking->seats()->attach($validated['seats']);

        // Clear search session
        session()->forget('searchData');

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Pemesanan tiket berhasil!');
    }
}