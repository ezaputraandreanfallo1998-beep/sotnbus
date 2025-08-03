<nav class="fixed w-full bg-white shadow z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold text-orange-600">SOTNBUS</a>

        <div class="space-x-4">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'text-orange-600 font-semibold' : 'text-gray-700' }} hover:text-orange-600">
                Beranda
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-orange-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-gray-700 hover:text-red-600">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-600">Masuk</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-orange-600">Daftar</a>
            @endauth
        </div>
    </div>
</nav>
