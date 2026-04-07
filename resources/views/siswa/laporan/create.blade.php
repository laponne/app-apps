@extends('layouts.siswa')
@section('title', 'Buat Laporan Pengaduan')
@section('content')
<div class="page-header mt-4 mb-4">
	<h1>Buat Laporan Pengaduan</h1>
	<p class="mb-0">Laporkan masalah pada sarana dan prasarana sekolah dengan detail yang jelas</p>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('siswa.laporan.store') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="mb-4">
						<x-select label="Kategori" name="kategori_id"
							:options="$kategori" labelField="nama_kategori" />
					</div>

					<div class="mb-4">
						<x-input label="Lokasi Kejadian" name="lokasi"
							placeholder="Contoh: Ruang Kelas X PPLG 1" />
					</div>

					<div class="mb-4">
						<x-textarea label="Keterangan Masalah" name="ket"
							placeholder="Jelaskan masalah atau kerusakan yang terjadi secara detail..." rows="5" />
					</div>

					<div class="mb-4">
						<label class="form-label">
							Lampiran Bukti <span class="badge bg-secondary">Opsional</span>
						</label>
						<input type="file" class="form-control @error('attachments.*') is-invalid @enderror"
							name="attachments[]" multiple accept=".jpg,.jpeg,.png,.pdf">
						<div class="form-text">
							<i class="bi bi-info-circle me-1"></i>
							Format: JPG, JPEG, PNG, PDF | Maksimal 5MB per file | Bisa upload lebih dari 1 file
						</div>
						@error('attachments.*')
							<div class="invalid-feedback d-block">{{ $message }}</div>
						@enderror
					</div>

					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary flex-grow-1">
							<i class="bi bi-send me-2"></i>Kirim Laporan
						</button>
						<a href="{{ route('siswa.dashboard') }}" class="btn btn-outline-secondary">
							Batal
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>
@endsection
