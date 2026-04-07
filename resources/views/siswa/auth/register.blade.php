@extends('layouts.auth')
@section('title', 'Daftar Siswa')
@section('content')
<div class="card shadow-md border-0" style="width: 100%; max-width: 420px;">
	<div class="card-header bg-primary text-white text-center py-4">
		<h4 class="card-title mb-0">
			<i class="bi bi-person-plus me-2"></i>Daftar Akun Siswa
		</h4>
	</div>
	<form class="card-body p-4" method="POST" action="{{ route('siswa.register') }}">
		@csrf

		<div class="mb-3">
			<label class="form-label">NIS</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-card-text text-muted"></i>
				</span>
				<input type="text" name="nis"
					class="form-control border-start-0 @error('nis') is-invalid @enderror"
					placeholder="Nomor Induk Siswa"
					value="{{ old('nis', $nis) }}">
			</div>
			@error('nis')
				<div class="invalid-feedback d-block mt-2">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label">Nama Lengkap</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-person text-muted"></i>
				</span>
				<input type="text" name="nama"
					class="form-control border-start-0 @error('nama') is-invalid @enderror"
					placeholder="Nama Lengkap"
					value="{{ old('nama') }}">
			</div>
			@error('nama')
				<div class="invalid-feedback d-block mt-2">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-4">
			<label class="form-label">Kelas</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-mortarboard text-muted"></i>
				</span>
				<input type="text" name="kelas"
					class="form-control border-start-0 @error('kelas') is-invalid @enderror"
					placeholder="Contoh: X PPLG 1"
					value="{{ old('kelas') }}">
			</div>
			@error('kelas')
				<div class="invalid-feedback d-block mt-2">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="d-grid mb-3">
			<button type="submit" class="btn btn-primary btn-lg">
				<i class="bi bi-check-circle me-2"></i>Daftar
			</button>
		</div>

		<hr class="my-3">

		<p class="text-center text-muted small mb-0">
			Sudah punya akun?
			<a href="{{ route('siswa.login') }}" class="text-primary fw-bold text-decoration-none">
				Login di sini
			</a>
		</p>
	</form>
</div>
@endsection
