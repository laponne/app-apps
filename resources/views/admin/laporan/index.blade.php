@extends('layouts.admin')
@section('title', 'Daftar Laporan')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Daftar Laporan Pengaduan</h1>
		<p class="text-gray-600 mt-1">Kelola dan pantau semua laporan pengaduan dari siswa</p>
	</div>

	<!-- Success Alert -->
	@if (session('success'))
		<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
			<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
			<p class="text-green-800">{{ session('success') }}</p>
		</div>
	@endif

	<!-- Filter Card -->
	<div class="bg-white rounded-lg shadow p-6 mb-6">
		<form method="GET" action="{{ route('admin.laporan.index') }}" class="flex flex-col sm:flex-row gap-3 items-end">
			<div class="flex-1">
				<label class="block text-sm font-medium text-gray-700 mb-2">
					<i class="bi bi-funnel me-2"></i>Filter Status
				</label>
				<select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" onchange="this.form.submit()">
					<option value="">-- Semua Status --</option>
					<option value="belum" {{ request('status') === 'belum' ? 'selected' : '' }}>Belum Diproses</option>
					<option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
					<option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
				</select>
			</div>
			<a href="{{ route('admin.laporan.index') }}" class="px-4 py-2 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition flex items-center justify-center gap-2">
				<i class="bi bi-arrow-clockwise"></i>Reset
			</a>
		</form>
	</div>

	<!-- Reports Table -->
	<div class="bg-white rounded-lg shadow overflow-hidden">
		<div class="overflow-x-auto">
			@include('admin.laporan.list')
		</div>
		<div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
			{{ $laporan->links() }}
		</div>
	</div>
@endsection
