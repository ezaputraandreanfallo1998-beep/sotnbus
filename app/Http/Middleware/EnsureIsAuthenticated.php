<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureIsAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Simpan data pencarian ke session jika ada
            if ($request->has(['origin', 'destination', 'date', 'passengers'])) {
                session([
                    'searchData' => $request->only(['origin', 'destination', 'date', 'passengers']),
                    'redirect_to_tickets' => true
                ]);
            }

            session(['url.intended' => $request->fullUrl()]);
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
