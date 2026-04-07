<div class="card sticky-top" style="top: 80px;">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-sliders me-2"></i>Ubah Status
		</h5>
	</div>
	<form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" class="card-body">
		@csrf
		@method('PUT')

		<div class="mb-4">
			<label class="form-label">Status Laporan</label>
			<select name="status" class="form-select" required>
				<option value="">-- Pilih Status --</option>
				<option value="proses" {{ $laporan->aspirasi?->status === 'proses' ? 'selected' : '' }}>
					Sedang Diproses
				</option>
				<option value="selesai" {{ $laporan->aspirasi?->status === 'selesai' ? 'selected' : '' }}>
					Selesai
				</option>
			</select>
		</div>

		<button type="submit" class="btn btn-primary w-100">
			<i class="bi bi-check-circle me-2"></i>Simpan Perubahan
		</button>
	</form>

	<div class="card-footer bg-light" style="border-radius: 0 0 0.75rem 0.75rem;">
		<div class="alert alert-info alert-sm small mb-0">
			<i class="bi bi-info-circle me-1"></i>
			Perubahan status akan langsung dikirim notifikasi ke siswa.
		</div>
	</div>
</div>
