@extends('layouts.admin')
@section('title', 'Pengaturan Akun')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Pengaturan Akun Admin</h1>
	<p class="mb-0">Kelola informasi akun dan keamanan Anda</p>
</div>

@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mb-4">
		<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
@endif

<div class="row">
	<div class="col-lg-6">
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-person-circle me-2"></i>Profil Akun
				</h5>
			</div>
			<form class="card-body" method="POST" action="{{ route('admin.akun') }}">
				@csrf
				<div class="mb-3">
					<x-input name="nama" placeholder="Nama Lengkap" :value="$admin->nama" />
				</div>
				<div class="mb-4">
					<x-input name="username" placeholder="Username" :value="$admin->username" />
				</div>
				<button class="btn btn-primary">
					<i class="bi bi-check-circle me-2"></i>Simpan Perubahan
				</button>
			</form>
		</div>

		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-lock me-2"></i>Ganti Password
				</h5>
			</div>
			<form class="card-body" method="POST" action="{{ route('admin.akun.password') }}">
				@csrf
				<div class="mb-3">
					<x-input type="password" name="password_lama" placeholder="Password Saat Ini" />
				</div>
				<div class="mb-3">
					<x-input type="password" name="password_baru" placeholder="Password Baru" />
				</div>
				<div class="mb-4">
					<x-input type="password" name="password_baru_confirmation" placeholder="Konfirmasi Password Baru" />
				</div>
				<button class="btn btn-warning">
					<i class="bi bi-shield-check me-2"></i>Perbarui Password
				</button>
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-light">
				<h5 class="card-title mb-0">
					<i class="bi bi-info-circle text-info me-2"></i>Informasi Akun
				</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<p class="text-muted small mb-1">Username</p>
					<p class="fw-bold">{{ $admin->username }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Nama Admin</p>
					<p class="fw-bold">{{ $admin->nama }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Status</p>
					<span class="badge bg-success">Aktif</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
