<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::orderBy('name')->get();
        
        return view('search.index', [
            'locations' => $locations,
            'searchData' => $request->only(['origin', 'destination', 'date'])
        ]);
    }

    public function results(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id|different:origin',
            'date' => 'required|date|after_or_equal:today',
            'passengers' => 'required|integer|min:1|max:10'
        ]);

        return redirect()->route('bus-routes.search', $validated);
    }
}