@extends('layouts.siswa')
@section('content')
<div class="page-header mt-4 mb-4">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<h1>Dashboard</h1>
			<p class="mb-0">Selamat datang, {{ auth('siswa')->user()->nama }}!</p>
		</div>
		<a href="{{ route('siswa.laporan.create') }}" class="btn btn-primary">
			<i class="bi bi-plus-circle me-2"></i>Buat Pengaduan Baru
		</a>
	</div>
</div>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show">
	<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Riwayat Laporan Saya</h5>
	</div>
	<div class="card-body p-0 table-responsive">
		@include('siswa.partials.list-dashboard')
	</div>
	<div class="card-footer bg-light">
		{{ $laporan->links() }}
	</div>
</div>
@endsection
