@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-160px)] bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full mx-auto">
        @if(session('success'))
        <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <p>{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Card -->
            <div class="bg-blue-600 py-5 px-6">
                <div class="flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-in-alt text-white text-xl"></i>
                    <h2 class="text-center text-xl font-bold text-white">{{ __('Login') }}</h2>
                </div>
            </div>

            <!-- Form Login -->
            <form class="p-6 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-user text-blue-500 mr-2"></i>{{ __('Username atau Email') }}
                    </label>
                    <input id="login" type="text" name="login" value="{{ old('login') }}" required autocomplete="username"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('login') border-red-500 @enderror"
                        placeholder="username atau email@example.com">
                    @error('login')
                    <p class="mt-1 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-lock text-blue-500 mr-2"></i>{{ __('Password') }}
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror pr-10"
                        placeholder="••••••••">
                    <button type="button" onclick="togglePassword()"
                        class="absolute right-3 bottom-3 text-gray-500 hover:text-blue-600 focus:outline-none">
                        <i id="eye-icon" class="fas fa-eye"></i>
                    </button>
                    @error('password')
                    <p class="mt-1 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Login') }}
                    </button>
                </div>
            </form>

            <!-- Footer Card -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="text-center text-sm text-gray-600">
                    <p>Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            {{ __('Daftar Sekarang') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection