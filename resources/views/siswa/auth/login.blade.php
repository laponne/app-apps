@extends('layouts.auth')
@section('title', 'Login Siswa')
@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-8 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-full mb-3">
                <i class="bi bi-box-arrow-in-right text-white text-lg"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Login Siswa</h2>
            <p class="text-green-100 text-sm mt-1">Masuk ke portal siswa</p>
        </div>

        <!-- Form -->
        <form class="p-6" method="post" action="{{ route('siswa.login') }}">
            @csrf

            <!-- NIS Field -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">NIS (Nomor Induk Siswa)</label>
                <div class="flex items-center border-2 rounded-lg overflow-hidden transition @error('nis') border-red-500 bg-red-50 @else border-gray-300 focus-within:border-green-500 focus-within:ring-2 focus-within:ring-green-100 @enderror">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500 @error('nis') bg-red-100 @enderror">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="nis"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('nis') bg-red-50 @enderror"
                        placeholder="Masukkan NIS Anda"
                        value="{{ old('nis') }}">
                </div>
                @error('nis')
                    <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg flex items-start gap-2">
                        <i class="bi bi-exclamation-circle-fill text-red-600 text-lg flex-shrink-0 mt-0.5"></i>
                        <p class="text-sm text-red-700 font-medium">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                <i class="bi bi-unlock"></i>Masuk
            </button>

            <!-- Divider -->
            <div class="flex items-center gap-3 my-6">
                <div class="flex-1 h-px bg-gray-300"></div>
                <span class="text-xs text-gray-500 font-medium">atau</span>
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>

            <!-- Register Link -->
            <p class="text-center text-gray-600 text-sm">
                Belum punya akun? 
                <a href="{{ route('siswa.register') }}" class="text-green-600 hover:text-green-700 font-medium transition">
                    Daftar di sini
                </a>
            </p>
        </form>
    </div>
@endsection
