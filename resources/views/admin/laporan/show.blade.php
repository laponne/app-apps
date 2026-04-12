@extends('layouts.admin')
@section('title', 'Detail Laporan')
@section('content')
<div class="flex flex-col md:flex-row md:justify-between md:items-start mb-8 mt-4">
	<div>
		<h1 class="text-3xl font-bold text-gray-900">Detail Laporan Pengaduan</h1>
		<p class="text-gray-600 mt-1">Lihat detail dan kelola status laporan</p>
	</div>
	<a href="{{ route('admin.laporan.index') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition">
		<i class="bi bi-arrow-left"></i>Kembali
	</a>
</div>

@if (session('success'))
	<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
		<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
		<p class="text-green-800 flex-1">{{ session('success') }}</p>
		<button type="button" class="text-green-500 hover:text-green-700 text-xl">
			<i class="bi bi-x"></i>
		</button>
	</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
	<div class="lg:col-span-2">
		@include('admin.laporan.detil')
	</div>
	<div class="lg:col-span-1">
		@include('admin.laporan.form-status')
	</div>
</div>
@endsection
