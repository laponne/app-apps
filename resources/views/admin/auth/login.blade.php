@extends('layouts.auth')
@section('title', 'Login Admin')
@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-full mb-3">
                <i class="bi bi-shield-lock text-white text-lg"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Login Admin</h2>
            <p class="text-blue-100 text-sm mt-1">Masuk ke sistem administrasi</p>
        </div>

        <!-- Form -->
        <form class="p-6" method="post" action="{{ route('admin.login') }}">
            @csrf

            <!-- Username Field -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100 transition">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('username') bg-red-50 @enderror"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}">
                </div>
                @error('username')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100 transition">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500">
                        <i class="bi bi-key"></i>
                    </span>
                    <input type="password" id="password" name="password"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('password') bg-red-50 @enderror"
                        placeholder="Masukkan password">
                    <button type="button" onclick="togglePassword()" class="px-3 py-2 bg-gray-50 text-gray-500 hover:text-gray-700 transition cursor-pointer">
                        <i id="icon-password" class="bi bi-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2 mb-4">
                <i class="bi bi-unlock"></i>Masuk
            </button>
        </form>
    </div>
@endsection

@push('js')
<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('icon-password');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endpush
