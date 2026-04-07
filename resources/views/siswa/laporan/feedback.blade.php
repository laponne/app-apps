<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-star-fill text-warning me-2"></i>Feedback Kepuasan
		</h5>
	</div>
	<div class="card-body">
		@if ($laporan->aspirasi->feedback)
			{{-- SUDAH MEMBERI FEEDBACK --}}
			<div class="alert alert-success d-flex align-items-center gap-3 border-0 mb-0">
				<i class="bi bi-check-circle-fill" style="font-size: 1.5rem;"></i>
				<div>
					<p class="mb-1"><small class="text-muted">Feedback Anda:</small></p>
					<strong style="font-size: 1.1rem;">
						@php
							$feedbackList = [
								1 => 'Tidak Puas',
								2 => 'Kurang Puas',
								3 => 'Cukup Puas',
								4 => 'Puas',
								5 => 'Sangat Puas',
							];
						@endphp
						{{ $feedbackList[$laporan->aspirasi->feedback] ?? '-' }}
					</strong>
				</div>
			</div>
		@else
			{{-- BELUM MEMBERI FEEDBACK --}}
			<p class="text-muted small mb-3">Bantulah kami berkembang dengan memberikan feedback tentang kepuasan Anda terhadap penyelesaian laporan ini.</p>
			<form action="{{ route('siswa.laporan.feedback', $laporan->aspirasi->id) }}" method="POST"
				enctype="multipart/form-data">
				@csrf

				<div class="mb-4">
					<label class="form-label">Pilih Tingkat Kepuasan</label>
					<div class="d-flex flex-column gap-2">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="feedback" value="1" id="feedback1">
							<label class="form-check-label" for="feedback1">
								<i class="bi bi-emoji-frown text-danger me-2"></i>Tidak Puas
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="feedback" value="2" id="feedback2">
							<label class="form-check-label" for="feedback2">
								<i class="bi bi-emoji-neutral text-warning me-2"></i>Kurang Puas
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="feedback" value="3" id="feedback3">
							<label class="form-check-label" for="feedback3">
								<i class="bi bi-emoji-smile text-info me-2"></i>Cukup Puas
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="feedback" value="4" id="feedback4">
							<label class="form-check-label" for="feedback4">
								<i class="bi bi-emoji-smile-fill text-success me-2"></i>Puas
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="feedback" value="5" id="feedback5">
							<label class="form-check-label" for="feedback5">
								<i class="bi bi-emoji-laughing text-success me-2"></i>Sangat Puas
							</label>
						</div>
					</div>
					@error('feedback')
						<div class="text-danger small mt-2">
							{{ $message }}
						</div>
					@enderror
				</div>

				<div class="mb-4">
					<label for="bukti" class="form-label">
						Lampirkan Bukti Selesai <span class="text-danger">*</span>
					</label>
					<input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror"
						required accept="image/*,application/pdf">
					<small class="form-text text-muted">Format: JPG, PNG, PDF | Maks 5MB</small>
					@error('bukti')
						<div class="text-danger small mt-2">
							{{ $message }}
						</div>
					@enderror
				</div>

				<div class="d-grid">
					<button class="btn btn-primary">
						<i class="bi bi-check-circle me-2"></i>Kirim Feedback
					</button>
				</div>
			</form>
		@endif
	</div>
</div>
