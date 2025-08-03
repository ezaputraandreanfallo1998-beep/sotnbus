@extends('layouts.app')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center text-orange-600 mb-8">Selamat Datang di SOTNBUS</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($featuredRoutes as $route)
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $route->origin->name }} → {{ $route->destination->name }}</h2>
                        <p class="text-gray-600">Bus: {{ $route->bus->name }}</p>
                        <a href="{{ route('bus-routes.show', $route->id) }}" class="text-orange-600 hover:underline">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
