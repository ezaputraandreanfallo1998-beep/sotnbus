@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h2 class="display-5">Halo, {{ Auth::user()->name }} 👋</h2>
        <p class="lead">Selamat datang di dashboard pemesanan tiket bus Anda.</p>
    </div>

    <!-- Ringkasan Pemesanan -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card border-primary text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pemesanan</h5>
                    <p class="display-6">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success text-center">
                <div class="card-body">
                    <h5 class="card-title">Tiket Aktif</h5>
                    <p class="display-6">{{ $activeOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger text-center">
                <div class="card-body">
                    <h5 class="card-title">Tiket Batal</h5>
                    <p class="display-6">{{ $cancelledOrders }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Pemesanan Terbaru -->
    <div class="mb-5">
        <h4>Riwayat Pemesanan Terbaru</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Rute</th>
                        <th>Kursi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->busRoute->origin->name }} → {{ $order->busRoute->destination->name }}</td>
                            <td>{{ $order->seat_number }}</td>
                            <td>
                                <span class="badge bg-{{ $order->order_status == 'aktif' ? 'success' : ($order->order_status == 'batal' ? 'danger' : 'secondary') }}">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Belum ada pemesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Promo Aktif -->
    @if($promotions->count())
    <div class="mb-5">
        <h4>Promo Aktif untuk Anda 🎁</h4>
        <div class="row">
            @foreach($promotions as $promo)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-warning">
                        <div class="card-header bg-warning text-dark">
                            <strong>{{ $promo->title }}</strong>
                        </div>
                        <div class="card-body">
                            <p>{{ $promo->description }}</p>
                            <p><strong>Kode:</strong> {{ $promo->discount_code }}</p>
                            <p><strong>Diskon:</strong> {{ $promo->discount_amount }}%</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">Berlaku sampai {{ $promo->end_date->format('d M Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
