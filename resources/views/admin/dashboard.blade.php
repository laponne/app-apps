@extends('layouts.admin')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Dashboard Admin</h1>
	<p class="mb-0">Kelola dan pantau semua laporan pengaduan sarana sekolah</p>
</div>

<div class="row g-4 mb-4">
	<div class="col-md-3">
		<div class="card stats-card h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<p class="text-muted small mb-1">Total Siswa</p>
						<h3 class="mb-0">{{ $totalSiswa ?? 0 }}</h3>
					</div>
					<div class="rounded-3 p-3" style="background-color: rgba(37, 99, 235, 0.1);">
						<i class="bi bi-people text-primary" style="font-size: 1.5rem;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card stats-card h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<p class="text-muted small mb-1">Total Laporan</p>
						<h3 class="mb-0">{{ $totalLaporan ?? 0 }}</h3>
					</div>
					<div class="rounded-3 p-3" style="background-color: rgba(59, 130, 246, 0.1);">
						<i class="bi bi-file-earmark-text" style="font-size: 1.5rem; color: #3b82f6;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card stats-card h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<p class="text-muted small mb-1">Laporan Diproses</p>
						<h3 class="mb-0">{{ $laporanProses ?? 0 }}</h3>
					</div>
					<div class="rounded-3 p-3" style="background-color: rgba(251, 146, 60, 0.1);">
						<i class="bi bi-hourglass-split" style="font-size: 1.5rem; color: #fb923c;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card stats-card h-100">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<p class="text-muted small mb-1">Laporan Selesai</p>
						<h3 class="mb-0">{{ $laporanSelesai ?? 0 }}</h3>
					</div>
					<div class="rounded-3 p-3" style="background-color: rgba(16, 185, 129, 0.1);">
						<i class="bi bi-check-circle-fill" style="font-size: 1.5rem; color: #10b981;"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('admin.list-laporan')
@endsection

<style>
.stats-card {
	border: none;
	border-radius: 0.75rem;
	background-color: #ffffff;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
	transition: all 0.3s ease;
}

.stats-card:hover {
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
	transform: translateY(-2px);
}

.stats-card h3 {
	font-weight: 700;
	color: #111827;
	font-size: 2rem;
}

.stats-card .rounded-3 {
	width: 60px;
	height: 60px;
	display: flex;
	align-items: center;
	justify-content: center;
}
</style>
