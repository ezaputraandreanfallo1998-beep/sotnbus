@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-md overflow-hidden">
        
        <!-- Header -->
        <div class="bg-blue-800 text-white text-center py-6 px-8">
            <h2 class="text-2xl font-bold">Buat Akun Baru</h2>
            <p class="text-sm mt-1">Daftar sekarang untuk menikmati berbagai promo menarik</p>
        </div>

        <!-- Form -->
        <div class="px-8 py-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           placeholder="Contoh: Eza Fallo"
                           class="w-full border rounded px-4 py-2">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                           placeholder="Contoh: ezafallo"
                           class="w-full border rounded px-4 py-2">
                    @error('username')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           placeholder="Contoh: eza@email.com"
                           class="w-full border rounded px-4 py-2">
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="tel" id="phone" required
                           placeholder="Contoh: 8123456789"
                           style="padding: 8px 200px !important;"
                           class="w-full border rounded px-4 py-2">
                    <input type="hidden" name="full_phone">
                    @error('full_phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                           placeholder="Minimal 8 karakter"
                           class="w-full border rounded px-4 py-2 pr-10">
                    <span toggle="#password" class="absolute right-3 top-7 cursor-pointer toggle-password text-gray-700">
                        <i class="fa fa-eye"></i>
                    </span>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4 relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           placeholder="Ulangi password di atas"
                           class="w-full border rounded px-4 py-2 pr-10">
                    <span toggle="#password_confirmation" class="absolute right-3 top-7 cursor-pointer toggle-password text-gray-700">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>

                <!-- Terms -->
                <p class="text-xs text-gray-500 my-4">
                    Dengan mendaftar, Anda menyetujui <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">Syarat & Ketentuan</a> dan 
                    <a href="{{ route('privacy') }}" class="text-blue-600 hover:underline">Kebijakan Privasi</a>.
                </p>

                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded transition">
                    DAFTAR SEKARANG
                </button>

                <div class="text-center mt-4 text-sm text-gray-600">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Masuk disini</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<!-- intl-tel-input -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

<script>
    // Inisialisasi telepon
    const phoneInput = document.querySelector("#phone");
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "id",
        preferredCountries: ["id", "my", "sg", "th", "us"],
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Ambil full phone sebelum submit
    document.querySelector('#registerForm').addEventListener('submit', function (e) {
        const fullPhone = iti.getNumber();
        this.querySelector('input[name="full_phone"]').value = fullPhone;
    });

    // Toggle password
    document.querySelectorAll(".toggle-password").forEach(function (el) {
        el.addEventListener("click", function () {
            const input = document.querySelector(this.getAttribute("toggle"));
            const icon = this.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    });
</script>
@endpush