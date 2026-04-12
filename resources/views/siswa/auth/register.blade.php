@extends('layouts.auth')
@section('title', 'Daftar Siswa')
@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-8 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-full mb-3">
                <i class="bi bi-person-plus text-white text-lg"></i>
            </div>
            <h2 class="text-xl font-bold text-white">Daftar Akun Siswa</h2>
            <p class="text-emerald-100 text-sm mt-1">Buat akun baru untuk mengajukan pengaduan</p>
        </div>

        <!-- Form -->
        <form class="p-6" method="POST" action="{{ route('siswa.register') }}">
            @csrf

            <!-- NIS Field -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-100 transition">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500">
                        <i class="bi bi-card-text"></i>
                    </span>
                    <input type="text" name="nis"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('nis') bg-red-50 @enderror"
                        placeholder="Nomor Induk Siswa"
                        value="{{ old('nis', $nis ?? '') }}">
                </div>
                @error('nis')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Field -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-100 transition">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="nama"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('nama') bg-red-50 @enderror"
                        placeholder="Nama Lengkap"
                        value="{{ old('nama') }}">
                </div>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kelas Field -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-100 transition">
                    <span class="px-3 py-2 bg-gray-50 text-gray-500">
                        <i class="bi bi-mortarboard"></i>
                    </span>
                    <input type="text" name="kelas"
                        class="flex-1 px-3 py-2 border-0 focus:ring-0 outline-none @error('kelas') bg-red-50 @enderror"
                        placeholder="Contoh: X PPLG 1"
                        value="{{ old('kelas') }}">
                </div>
                @error('kelas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-medium py-2 rounded-lg transition duration-200 flex items-center justify-center gap-2 mb-4">
                <i class="bi bi-check-circle"></i>Daftar
            </button>

            <!-- Divider -->
            <div class="flex items-center gap-3 my-4">
                <div class="flex-1 h-px bg-gray-300"></div>
                <span class="text-xs text-gray-500 font-medium">atau</span>
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>

            <!-- Login Link -->
            <p class="text-center text-gray-600 text-sm">
                Sudah punya akun? 
                <a href="{{ route('siswa.login') }}" class="text-emerald-600 hover:text-emerald-700 font-medium transition">
                    Login di sini
                </a>
            </p>
        </form>
    </div>
@endsection
