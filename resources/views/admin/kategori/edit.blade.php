@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Edit Kategori Laporan</h1>
	<p class="mb-0">Perbarui informasi kategori laporan</p>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-pencil-square me-2"></i>Form Edit Kategori
				</h5>
			</div>
			<form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="card-body">
				@csrf
				@method('PUT')

				<div class="mb-4">
					<label class="form-label">Nama Kategori</label>
					<x-input name="nama_kategori"
						:value="$kategori->nama_kategori" placeholder="Nama Kategori" />
				</div>

				<div class="d-flex gap-2">
					<button type="submit" class="btn btn-primary flex-grow-1">
						<i class="bi bi-check-circle me-2"></i>Perbarui
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
