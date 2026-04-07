@extends('layouts.auth')
@section('title', 'Login Admin')
@section('content')
<div class="card shadow-md border-0" style="width: 100%; max-width: 420px;">
	<div class="card-header bg-primary text-white text-center py-4">
		<h4 class="card-title mb-0">
			<i class="bi bi-shield-lock me-2"></i>Login Admin
		</h4>
	</div>
	<form class="card-body p-4" method="post" action="{{ route('admin.login') }}">
		@csrf

		<div class="mb-4">
			<label class="form-label">Username</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-person text-muted"></i>
				</span>
				<input type="text"
					class="form-control border-start-0 @error('username') is-invalid @enderror"
					name="username"
					placeholder="Masukkan username">
			</div>
			@error('username')
				<div class="invalid-feedback d-block mt-2">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-4">
			<label class="form-label">Password</label>
			<div class="input-group">
				<span class="input-group-text bg-light border-end-0">
					<i class="bi bi-key text-muted"></i>
				</span>
				<input type="password" id="password"
					class="form-control border-start-0 border-end-0 @error('password') is-invalid @enderror"
					name="password" placeholder="Masukkan password">
				<span class="input-group-text bg-light border-start-0" style="cursor: pointer" onclick="togglePassword()">
					<i id="icon-password" class="bi bi-eye text-muted"></i>
				</span>
			</div>
			@error('password')
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

		<div class="alert alert-info alert-sm small mb-0">
			<i class="bi bi-info-circle me-1"></i>
			Gunakan akun admin yang telah didaftarkan oleh sistem
		</div>
	</form>
</div>
@endsection
@push('js')
<script>
	function togglePassword() {
		const password = document.getElementById('password');
		const icon = document.getElementById('icon-password');
		if (password.type === 'password') {
			password.type = 'text';
			icon.classList.remove('bi-eye');
			icon.classList.add('bi-eye-slash');
		} else {
			password.type = 'password';
			icon.classList.remove('bi-eye-slash');
			icon.classList.add('bi-eye');
		}
	}
</script>
@endpush
