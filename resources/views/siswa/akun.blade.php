@extends('layouts.siswa')
@section('title', 'Profil Siswa')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Profil Saya</h1>
		<p class="text-gray-600 mt-1">Lihat dan perbarui data profil akun Anda</p>
	</div>

	<!-- Success Alert -->
	@if (session('success'))
		<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
			<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
			<p class="text-green-800">{{ session('success') }}</p>
		</div>
	@endif

	<div class="grid lg:grid-cols-2 gap-8">
		<!-- Edit Profile Card -->
		<div>
			<div class="bg-white rounded-lg shadow p-6">
				<h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
					<i class="bi bi-person-fill"></i>Data Profil
				</h3>
				<form action="{{ route('siswa.akun.update') }}" method="POST" class="space-y-6">
					@csrf
					@method('PUT')

					<x-input name="nis" label="NIS (Nomor Induk Siswa)" :value="$siswa->nis" />
					<x-input name="nama" label="Nama Lengkap" :value="$siswa->nama" />
					<x-input name="kelas" label="Kelas" :value="$siswa->kelas" />

					<button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
						<i class="bi bi-check-circle"></i>Perbarui Profil
					</button>
				</form>
			</div>
		</div>

		<!-- Profile Summary Card -->
		<div>
			<div class="bg-white rounded-lg shadow overflow-hidden">
				<div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-200 px-6 py-4">
					<h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
						<i class="bi bi-info-circle text-blue-600"></i>Ringkasan Akun
					</h3>
				</div>
				<div class="p-6 space-y-4">
					<!-- NIS -->
					<div>
						<p class="text-sm text-gray-600 mb-1">NIS (Nomor Induk Siswa)</p>
						<p class="text-lg font-semibold text-gray-900">{{ $siswa->nis }}</p>
					</div>

					<!-- Name -->
					<div>
						<p class="text-sm text-gray-600 mb-1">Nama Lengkap</p>
						<p class="text-lg font-semibold text-gray-900">{{ $siswa->nama }}</p>
					</div>

					<!-- Class -->
					<div>
						<p class="text-sm text-gray-600 mb-1">Kelas</p>
						<p class="text-lg font-semibold text-gray-900">{{ $siswa->kelas }}</p>
					</div>

					<!-- Registration Date -->
					<div class="pt-4 border-t border-gray-200">
						<p class="text-sm text-gray-600 mb-1">Terdaftar Sejak</p>
						<p class="text-lg font-semibold text-gray-900">{{ $siswa->created_at->format('d M Y') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
