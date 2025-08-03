<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOTNBUS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Konten Utama --}}
    <main class="pt-20">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>
</html>
