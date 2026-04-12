@extends('layouts.admin')
@section('title', 'Pengaturan Akun')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Pengaturan Akun Admin</h1>
		<p class="text-gray-600 mt-1">Kelola informasi akun dan keamanan Anda</p>
	</div>

	<!-- Success Alert -->
	@if (session('success'))
		<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
			<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
			<p class="text-green-800">{{ session('success') }}</p>
		</div>
	@endif

	<div class="grid lg:grid-cols-2 gap-8">
		<!-- Left Column - Forms -->
		<div class="space-y-6">
			<!-- Profile Form Card -->
			<div class="bg-white rounded-lg shadow p-6">
				<h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
					<i class="bi bi-person-circle"></i>Profil Akun
				</h3>
				<form method="POST" action="{{ route('admin.akun') }}" class="space-y-6">
					@csrf
					<x-input name="nama" label="Nama Lengkap" placeholder="Nama Lengkap" :value="$admin->nama" />
					<x-input name="username" label="Username" placeholder="Username" :value="$admin->username" />
					<button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
						<i class="bi bi-check-circle"></i>Simpan Perubahan
					</button>
				</form>
			</div>

			<!-- Change Password Card -->
			<div class="bg-white rounded-lg shadow p-6">
				<h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
					<i class="bi bi-lock"></i>Ganti Password
				</h3>
				<form method="POST" action="{{ route('admin.akun.password') }}" class="space-y-6">
					@csrf
					<x-input type="password" name="password_lama" label="Password Saat Ini" placeholder="Masukkan password saat ini" />
					<x-input type="password" name="password_baru" label="Password Baru" placeholder="Masukkan password baru" />
					<x-input type="password" name="password_baru_confirmation" label="Konfirmasi Password Baru" placeholder="Konfirmasi password baru" />
					<button type="submit" class="w-full bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
						<i class="bi bi-shield-check"></i>Perbarui Password
					</button>
				</form>
			</div>
		</div>

		<!-- Right Column - Info Card -->
		<div>
			<div class="bg-white rounded-lg shadow overflow-hidden">
				<div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-200 px-6 py-4">
					<h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
						<i class="bi bi-info-circle text-blue-600"></i>Informasi Akun
					</h3>
				</div>
				<div class="p-6 space-y-6">
					<!-- Username -->
					<div>
						<p class="text-sm text-gray-600 mb-1">Username</p>
						<p class="text-lg font-semibold text-gray-900">{{ $admin->username }}</p>
					</div>

					<!-- Admin Name -->
					<div>
						<p class="text-sm text-gray-600 mb-1">Nama Admin</p>
						<p class="text-lg font-semibold text-gray-900">{{ $admin->nama }}</p>
					</div>

					<!-- Status -->
					<div>
						<p class="text-sm text-gray-600 mb-2">Status</p>
						<div class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
							<i class="bi bi-check-circle-fill me-1"></i>Aktif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
