<!-- resources/views/layouts/header.blade.php -->
<header class="bus-header">
    <div class="bus-container">
        <div class="bus-logo">
            <i class="fas fa-bus"></i>
            <span>SOTNBUS.COM</span>
        </div>
        
        <nav class="bus-nav">
            <ul>
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <!-- Menu lainnya -->
            </ul>
        </nav>
        
        <div class="bus-auth">
            <a href="{{ route('login') }}" class="bus-btn bus-btn--outline">Masuk</a>
            <a href="{{ route('register') }}" class="bus-btn bus-btn--primary">Daftar</a>
        </div>
    </div>
</header>