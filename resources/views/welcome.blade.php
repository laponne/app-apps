@extends('layouts.siswa')
@section('content')
<div class="container py-5">
	<div class="row align-items-center">
		<div class="col-lg-6 mb-4 mb-lg-0">
			<h1 class="display-4 fw-bold mb-3">
				Aplikasi Pengaduan Sarana Sekolah
			</h1>
			<p class="lead text-muted mb-4">
				Platform digital yang mudah digunakan untuk melaporkan kerusakan, kekurangan, atau permasalahan pada sarana dan prasarana sekolah secara terstruktur dan transparan.
			</p>
			<div class="d-flex gap-3">
				@guest('siswa')
				<a href="{{ route('siswa.login') }}" class="btn btn-primary btn-lg">
					<i class="bi bi-box-arrow-in-right me-2"></i>Masuk Siswa
				</a>
				<a href="{{ route('siswa.register') }}" class="btn btn-outline-primary btn-lg">
					<i class="bi bi-person-plus me-2"></i>Daftar Akun
				</a>
				@else
				<a href="{{ route('siswa.dashboard') }}" class="btn btn-primary btn-lg">
					<i class="bi bi-speedometer2 me-2"></i>Ke Dashboard
				</a>
				@endguest
			</div>
		</div>
		<div class="col-lg-6">
			<div class="row g-3">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body text-center py-4">
							<div class="text-primary mb-3" style="font-size: 2.5rem;">
								<i class="bi bi-file-text"></i>
							</div>
							<h5 class="card-title">Buat Laporan</h5>
							<p class="text-muted small mb-0">Laporkan masalah dengan mudah dan cepat</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body text-center py-4">
							<div class="text-primary mb-3" style="font-size: 2.5rem;">
								<i class="bi bi-clock-history"></i>
							</div>
							<h5 class="card-title">Pantau Progres</h5>
							<p class="text-muted small mb-0">Lihat status pengerjaan laporan Anda</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body text-center py-4">
							<div class="text-primary mb-3" style="font-size: 2.5rem;">
								<i class="bi bi-paperclip"></i>
							</div>
							<h5 class="card-title">Lampirkan Bukti</h5>
							<p class="text-muted small mb-0">Sertakan foto atau dokumen pendukung</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body text-center py-4">
							<div class="text-primary mb-3" style="font-size: 2.5rem;">
								<i class="bi bi-graph-up"></i>
							</div>
							<h5 class="card-title">Transparansi</h5>
							<p class="text-muted small mb-0">Lihat perbaikan yang sudah dilakukan</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
