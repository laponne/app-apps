@extends('layouts.admin')
@section('title', 'Detail Laporan')
@section('content')
<div class="page-header mt-4 mb-4">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<h1>Detail Laporan Pengaduan</h1>
			<p class="mb-0">Lihat detail dan kelola status laporan</p>
		</div>
		<a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary">
			<i class="bi bi-arrow-left me-2"></i>Kembali
		</a>
	</div>
</div>

@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mb-4">
		<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
@endif

<div class="row">
	<div class="col-lg-8">
		@include('admin.laporan.detil')
	</div>
	<div class="col-lg-4">
		@include('admin.laporan.form-status')
	</div>
</div>
@endsection
