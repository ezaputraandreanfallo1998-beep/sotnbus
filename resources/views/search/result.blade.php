@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Hasil Pencarian</h2>
    <p>Kota Asal: <strong>{{ $asal }}</strong></p>
    <p>Kota Tujuan: <strong>{{ $tujuan }}</strong></p>

    <div class="mt-6 text-gray-600">
        Jadwal perjalanan dan harga tiket akan tampil di sini nanti...
    </div>
</div>
@endsection
