<section class="bg-white py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-12">Rute Populer</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ([
                ['title' => 'Jakarta - Bandung', 'price' => 120000, 'img' => 'routes/route1.jpg'],
                ['title' => 'Surabaya - Yogyakarta', 'price' => 180000, 'img' => 'routes/route2.jpg'],
                ['title' => 'Semarang - Malang', 'price' => 150000, 'img' => 'routes/route3.jpg']
            ] as $route)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 group">
                    <img src="{{ asset('images/' . $route['img']) }}" alt="{{ $route['title'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $route['title'] }}</h3>
                        <p class="text-gray-600 mt-1">Tersedia: 08.00 & 20.00 WIB</p>
                        <p class="text-blue-600 font-bold mt-2">Mulai Rp{{ number_format($route['price'], 0, ',', '.') }}</p>
                        <a href="{{ route('login') }}" class="inline-block mt-4 text-sm font-medium text-white bg-blue-700 px-4 py-2 rounded hover:bg-blue-800 transition">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
