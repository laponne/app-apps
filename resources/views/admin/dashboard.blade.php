@extends('layouts.admin')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
		<p class="text-gray-600 mt-1">Kelola dan pantau semua laporan pengaduan sarana sekolah</p>
	</div>

	<!-- Stats Cards -->
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
		<!-- Total Siswa -->
		<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
			<div class="flex justify-between items-start">
				<div>
					<p class="text-sm text-gray-600 mb-2">Total Siswa</p>
					<h3 class="text-3xl font-bold text-gray-900">{{ $totalSiswa ?? 0 }}</h3>
				</div>
				<div class="bg-blue-100 p-3 rounded-lg">
					<i class="bi bi-people text-2xl text-blue-600"></i>
				</div>
			</div>
		</div>

		<!-- Total Laporan -->
		<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
			<div class="flex justify-between items-start">
				<div>
					<p class="text-sm text-gray-600 mb-2">Total Laporan</p>
					<h3 class="text-3xl font-bold text-gray-900">{{ $totalLaporan ?? 0 }}</h3>
				</div>
				<div class="bg-indigo-100 p-3 rounded-lg">
					<i class="bi bi-file-earmark-text text-2xl text-indigo-600"></i>
				</div>
			</div>
		</div>

		<!-- Laporan Diproses -->
		<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
			<div class="flex justify-between items-start">
				<div>
					<p class="text-sm text-gray-600 mb-2">Laporan Diproses</p>
					<h3 class="text-3xl font-bold text-gray-900">{{ $laporanProses ?? 0 }}</h3>
				</div>
				<div class="bg-orange-100 p-3 rounded-lg">
					<i class="bi bi-hourglass-split text-2xl text-orange-600"></i>
				</div>
			</div>
		</div>

		<!-- Laporan Selesai -->
		<div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
			<div class="flex justify-between items-start">
				<div>
					<p class="text-sm text-gray-600 mb-2">Laporan Selesai</p>
					<h3 class="text-3xl font-bold text-gray-900">{{ $laporanSelesai ?? 0 }}</h3>
				</div>
				<div class="bg-green-100 p-3 rounded-lg">
					<i class="bi bi-check-circle-fill text-2xl text-green-600"></i>
				</div>
			</div>
		</div>
	</div>

	<!-- Recent Reports Section -->
	@include('admin.list-laporan')
@endsection
