<!DOCTYPE html>
<html>
<head>
    <title>Detail Rute Bus</title>
</head>
<body>
    <h1>Detail Rute Bus</h1>
    <div>
        <p><strong>Bus:</strong> {{ $route->bus->name }}</p>
        <p><strong>Asal:</strong> {{ $route->origin->name }}</p>
        <p><strong>Tujuan:</strong> {{ $route->destination->name }}</p>
        <p><strong>Berangkat:</strong> {{ $route->formatted_departure_time }}</p>
        <p><strong>Tiba:</strong> {{ $route->formatted_arrival_time }}</p>
        <p><strong>Durasi:</strong> {{ $route->duration }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($route->price, 0, ',', '.') }}</p>
    </div>
    <a href="{{ route('bus-routes.index') }}">Kembali ke Daftar</a>
</body>
</html>