<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-person-circle me-2"></i>Informasi Siswa
		</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 mb-3">
				<p class="text-muted small mb-1">Nama Siswa</p>
				<p class="fw-bold">{{ $laporan->siswa->nama }}</p>
			</div>
			<div class="col-md-6 mb-3">
				<p class="text-muted small mb-1">NIS</p>
				<p class="fw-bold">{{ $laporan->siswa->nis }}</p>
			</div>
			<div class="col-md-6">
				<p class="text-muted small mb-1">Kelas</p>
				<p class="fw-bold">{{ $laporan->siswa->kelas }}</p>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-file-text me-2"></i>Detail Laporan
		</h5>
	</div>
	<div class="card-body">
		<div class="mb-3">
			<p class="text-muted small mb-1">Kategori</p>
			<span class="badge bg-primary">{{ $laporan->kategori->nama_kategori }}</span>
		</div>
		<div class="mb-3">
			<p class="text-muted small mb-1">Lokasi Kejadian</p>
			<p class="fw-bold">{{ $laporan->lokasi }}</p>
		</div>
		<div class="mb-3">
			<p class="text-muted small mb-1">Deskripsi Masalah</p>
			<p>{{ $laporan->ket }}</p>
		</div>
		<div class="mb-0">
			<p class="text-muted small mb-1">Tanggal Pengaduan</p>
			<p class="fw-bold">{{ $laporan->created_at->format('d M Y H:i') }}</p>
		</div>
		<hr>
		<div>
			<p class="text-muted small mb-1">Status Laporan</p>
			@if ($laporan->aspirasi?->status === 'selesai')
				<span class="badge bg-success" style="font-size: 0.9rem;">
					<i class="bi bi-check-circle me-1" style="font-size: 0.5rem;"></i>Selesai
				</span>
			@elseif ($laporan->aspirasi?->status === 'proses')
				<span class="badge bg-warning text-dark" style="font-size: 0.9rem;">
					<i class="bi bi-hourglass-split me-1" style="font-size: 0.5rem;"></i>Sedang Diproses
				</span>
			@else
				<span class="badge bg-secondary" style="font-size: 0.9rem;">
					<i class="bi bi-clock me-1" style="font-size: 0.5rem;"></i>Belum Diproses
				</span>
			@endif
		</div>
		@if ($laporan->feedback)
			<div class="mt-3">
				<p class="text-muted small mb-1">Feedback Kepuasan</p>
				<span class="badge bg-info">{{ ucfirst($laporan->feedback) }}</span>
			</div>
		@endif
	</div>
</div>

@if ($laporan->attachments->count() > 0)
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">
				<i class="bi bi-paperclip me-2"></i>Lampiran Bukti ({{ $laporan->attachments->count() }})
			</h5>
		</div>
		<div class="card-body">
			<div class="row g-3">
				@foreach ($laporan->attachments as $attachment)
					<div class="col-6 col-md-4">
						<div class="card border">
							@if ($attachment->isImage())
								<img src="{{ asset('storage/' . $attachment->file_path) }}"
									class="card-img-top" style="height: 120px; object-fit: cover; cursor: pointer;"
									alt="{{ $attachment->file_name }}"
									data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
							@else
								<div class="card-img-top bg-light d-flex align-items-center justify-content-center"
									style="height: 120px;">
									<i class="bi bi-file-pdf fs-2 text-danger"></i>
								</div>
							@endif
							<div class="card-body p-2">
								<small class="text-truncate d-block" title="{{ $attachment->file_name }}">
									{{ $attachment->file_name }}
								</small>
								<small class="text-muted">{{ $attachment->formatFileSize() }}</small>
								<div class="mt-2">
									<a href="{{ asset('storage/' . $attachment->file_path) }}"
										class="btn btn-sm btn-outline-primary w-100"
										target="_blank">
										<i class="bi bi-download me-1"></i>Buka
									</a>
								</div>
							</div>
						</div>
					</div>

					@if ($attachment->isImage())
						<!-- Image Modal -->
						<div class="modal fade" id="imageModal{{ $loop->index }}" tabindex="-1">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content border-0">
									<div class="modal-header border-0">
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body text-center p-0">
										<img src="{{ asset('storage/' . $attachment->file_path) }}"
											class="img-fluid" alt="{{ $attachment->file_name }}">
									</div>
									<div class="modal-footer border-0">
										<p class="small text-muted mb-0">{{ $attachment->file_name }}</p>
									</div>
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endif
