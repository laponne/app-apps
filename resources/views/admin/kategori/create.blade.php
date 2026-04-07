@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Tambah Kategori Laporan</h1>
	<p class="mb-0">Buat kategori laporan baru untuk pengaduan siswa</p>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-plus-circle me-2"></i>Form Kategori Baru
				</h5>
			</div>
			<form action="{{ route('admin.kategori.store') }}" method="POST" class="card-body">
				@csrf

				<div class="mb-4">
					<label class="form-label">Nama Kategori</label>
					<x-input name="nama_kategori" placeholder="Contoh: Ruang Kelas, Laboratorium, Toilet" />
				</div>

				<div class="d-flex gap-2">
					<button type="submit" class="btn btn-primary flex-grow-1">
						<i class="bi bi-check-circle me-2"></i>Simpan
					</button>
					<a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary">
						Batal
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
