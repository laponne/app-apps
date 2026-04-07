@extends('layouts.siswa')
@section('title', 'Profil Siswa')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Profil Saya</h1>
	<p class="mb-0">Lihat dan perbarui data profil akun Anda</p>
</div>

@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mb-4">
		<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
@endif

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-person-fill me-2"></i>Data Profil
				</h5>
			</div>
			<form class="card-body" action="{{ route('siswa.akun.update') }}" method="POST">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label class="form-label">NIS (Nomor Induk Siswa)</label>
					<x-input name="nis" :value="$siswa->nis" />
				</div>

				<div class="mb-3">
					<label class="form-label">Nama Lengkap</label>
					<x-input name="nama" :value="$siswa->nama" />
				</div>

				<div class="mb-4">
					<label class="form-label">Kelas</label>
					<x-input name="kelas" :value="$siswa->kelas" />
				</div>

				<button class="btn btn-primary">
					<i class="bi bi-check-circle me-2"></i>Perbarui Profil
				</button>
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-light">
				<h5 class="card-title mb-0">
					<i class="bi bi-info-circle text-info me-2"></i>Ringkasan Akun
				</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<p class="text-muted small mb-1">NIS</p>
					<p class="fw-bold">{{ $siswa->nis }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Nama</p>
					<p class="fw-bold">{{ $siswa->nama }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Kelas</p>
					<p class="fw-bold">{{ $siswa->kelas }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Terdaftar Sejak</p>
					<p class="fw-bold">{{ $siswa->created_at->format('d M Y') }}</p>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
@endsection
