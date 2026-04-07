@extends('layouts.auth')
@section('title', 'Login Siswa')
@section('content')
<div class="card shadow-md border-0" style="width: 100%; max-width: 420px;">
	<div class="card-header bg-primary text-white text-center py-4">
		<h4 class="card-title mb-0">
			<i class="bi bi-box-arrow-in-right me-2"></i>Login Siswa
		</h4>
	</div>
	<form class="card-body p-4" method="post" action="{{ route('siswa.login') }}">
		@csrf

		<div class="mb-4">
			<label class="form-label">NIS (Nomor Induk Siswa)</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-person text-muted"></i>
				</span>
				<input type="text"
					class="form-control border-start-0 @error('nis') is-invalid @enderror"
					name="nis"
					placeholder="Masukkan NIS Anda">
			</div>
			@error('nis')
				<div class="invalid-feedback d-block mt-2">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="d-grid mb-3">
			<button type="submit" class="btn btn-primary btn-lg">
				<i class="bi bi-unlock me-2"></i>Masuk
			</button>
		</div>

		<hr class="my-3">

		<p class="text-center text-muted small mb-0">
			Belum punya akun?
			<a href="{{ route('siswa.register') }}" class="text-primary fw-bold text-decoration-none">
				Daftar di sini
			</a>
		</p>
	</form>
</div>
@endsection
