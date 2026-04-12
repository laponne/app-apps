@extends('layouts.siswa')
@section('content')
	<!-- Page Header -->
	<div class="flex flex-col md:flex-row md:justify-between md:items-start mb-8">
		<div>
			<h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
			<p class="text-gray-600 mt-1">Selamat datang, <strong>{{ auth('siswa')->user()->nama }}</strong>!</p>
		</div>
		<a href="{{ route('siswa.laporan.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-4 py-2 rounded-lg font-medium transition">
			<i class="bi bi-plus-circle"></i>Buat Pengaduan Baru
		</a>
	</div>

	<!-- Success Alert -->
	@if (session('success'))
		<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
			<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
			<p class="text-green-800">{{ session('success') }}</p>
		</div>
	@endif

	<!-- Reports Table -->
	<div class="bg-white rounded-lg shadow overflow-hidden">
		<div class="border-b border-gray-200 px-6 py-4">
			<h3 class="text-lg font-semibold text-gray-900">Riwayat Laporan Saya</h3>
		</div>
		<div class="overflow-x-auto">
			@include('siswa.partials.list-dashboard')
		</div>
		<div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
			{{ $laporan->links() }}
		</div>
	</div>
@endsection
