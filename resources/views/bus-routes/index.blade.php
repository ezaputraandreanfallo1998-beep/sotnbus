<!DOCTYPE html>
<html>
<head>
    <title>Daftar Rute Bus</title>
</head>
<body>
    <h1>Daftar Rute Bus</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Berangkat</th>
                <th>Tiba</th>
                <th>Durasi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($routes as $route)
                <tr>
                    <td>{{ $route->bus->name }}</td>
                    <td>{{ $route->origin->name }}</td>
                    <td>{{ $route->destination->name }}</td>
                    <td>{{ $route->formatted_departure_time }}</td>
                    <td>{{ $route->formatted_arrival_time }}</td>
                    <td>{{ $route->duration }}</td>
                    <td>Rp {{ number_format($route->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>