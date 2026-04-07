@extends('layouts.admin')
@section('title', 'Daftar Laporan')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Daftar Laporan Pengaduan</h1>
	<p class="mb-0">Kelola dan pantau semua laporan pengaduan dari siswa</p>
</div>

@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mb-4">
		<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
@endif

<div class="card mb-4">
	<div class="card-body">
		<form method="GET" action="{{ route('admin.laporan.index') }}" class="row g-3 align-items-end">
			<div class="col-md-4">
				<label class="form-label">
					<i class="bi bi-funnel me-2"></i>Filter Status
				</label>
				<select name="status" class="form-select" onchange="this.form.submit()">
					<option value="">-- Semua Status --</option>
					<option value="belum" {{ request('status') === 'belum' ? 'selected' : '' }}>
						Belum Diproses
					</option>
					<option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>
						Sedang Diproses
					</option>
					<option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>
						Selesai
					</option>
				</select>
			</div>
			<div class="col-md-2">
				<a href="{{ route('admin.laporan.index') }}" class="btn btn-outline-secondary w-100">
					<i class="bi bi-arrow-clockwise me-1"></i>Reset
				</a>
			</div>
		</form>
	</div>
</div>

<div class="card">
	<div class="card-body p-0 table-responsive">
		@include('admin.laporan.list')
	</div>
	<div class="card-footer bg-light">
		{{ $laporan->links() }}
	</div>
</div>
@endsection
