@extends('layouts.siswa')
@section('title', 'Detail Laporan Pengaduan')
@section('content')
<div class="page-header mt-4 mb-4">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<h1>Detail Laporan Pengaduan</h1>
			<p class="mb-0">Pantau progres penanganan laporan Anda</p>
		</div>
		<a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">
			<i class="bi bi-arrow-left me-2"></i>Kembali
		</a>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		
		<!-- Detail Laporan -->
		<div class="card mb-4">
			<div class="card-header">
				<h5 class="card-title mb-0">
					<i class="bi bi-file-text me-2"></i>Detail Laporan
				</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<p class="text-muted small mb-1">Kategori</p>
					<span class="badge bg-primary">{{ $laporan->kategori->nama_kategori ?? '-' }}</span>
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
					<p class="text-muted small mb-1">Status Laporan</p>
					@if ($laporan->aspirasi?->status === 'selesai')
						<span class="badge bg-success">
							<i class="bi bi-check-circle me-1" style="font-size: 0.5rem;"></i>Selesai
						</span>
					@elseif ($laporan->aspirasi?->status === 'proses')
						<span class="badge bg-warning text-dark">
							<i class="bi bi-hourglass-split me-1" style="font-size: 0.5rem;"></i>Sedang Diproses
						</span>
					@else
						<span class="badge bg-secondary">
							<i class="bi bi-clock me-1" style="font-size: 0.5rem;"></i>Menunggu
						</span>
					@endif
				</div>
			</div>
		</div>

		<!-- Lampiran Bukti Laporan -->
		@php
			$lampiranLaporan = $laporan->attachments->where('type', 'laporan');
			$lampiranFeedback = $laporan->attachments->where('type', 'feedback');
		@endphp

		@if ($lampiranLaporan->count() > 0)
			<div class="card mb-4">
				<div class="card-header">
					<h5 class="card-title mb-0">
						<i class="bi bi-paperclip me-2"></i>Lampiran Bukti Laporan ({{ $lampiranLaporan->count() }})
					</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						@foreach ($lampiranLaporan as $attachment)
							<div class="col-6 col-md-4">
								<div class="card border">
									@if ($attachment->isImage())
										<img src="{{ asset('storage/' . $attachment->file_path) }}"
											class="card-img-top" style="height: 150px; object-fit: cover; cursor: pointer;"
											alt="{{ $attachment->file_name }}"
											data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->index }}">
									@else
										<div class="card-img-top bg-light d-flex align-items-center justify-content-center"
											style="height: 150px;">
											<i class="bi bi-file-pdf fs-2 text-danger"></i>
										</div>
									@endif
									<div class="card-body p-2">
										<small class="text-truncate d-block" title="{{ $attachment->file_name }}">
											{{ $attachment->file_name }}
										</small>
										<small class="text-muted">{{ $attachment->formatFileSize() }}</small>
										<div class="mt-2 d-flex gap-1">
											<a href="{{ asset('storage/' . $attachment->file_path) }}"
												class="btn btn-sm btn-outline-primary flex-grow-1"
												target="_blank">
												<i class="bi bi-download me-1"></i>Buka
											</a>
											<form action="{{ route('siswa.attachment.delete', $attachment) }}"
												method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-sm btn-outline-danger"
													onclick="return confirm('Hapus lampiran ini?')">
													<i class="bi bi-trash"></i>
												</button>
											</form>
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
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		@endif

		<!-- Lampiran Bukti Feedback -->
		@if ($lampiranFeedback->count() > 0)
			<div class="card mb-4">
				<div class="card-header bg-success text-white">
					<h5 class="card-title mb-0">
						<i class="bi bi-check-circle me-2"></i>Lampiran Bukti Selesai ({{ $lampiranFeedback->count() }})
					</h5>
				</div>
				<div class="card-body">
					<div class="row g-3">
						@foreach ($lampiranFeedback as $attachment)
							<div class="col-6 col-md-4">
								<div class="card border-success">
									@if ($attachment->isImage())
										<img src="{{ asset('storage/' . $attachment->file_path) }}"
											class="card-img-top" style="height: 150px; object-fit: cover; cursor: pointer;"
											alt="{{ $attachment->file_name }}"
											data-bs-toggle="modal" data-bs-target="#feedbackImageModal{{ $loop->index }}">
									@else
										<div class="card-img-top bg-light d-flex align-items-center justify-content-center"
											style="height: 150px;">
											<i class="bi bi-file-pdf fs-2 text-danger"></i>
										</div>
									@endif
									<div class="card-body p-2">
										<small class="text-truncate d-block" title="{{ $attachment->file_name }}">
											{{ $attachment->file_name }}
										</small>
										<small class="text-muted">{{ $attachment->formatFileSize() }}</small>
										<div class="mt-2 d-flex gap-1">
											<a href="{{ asset('storage/' . $attachment->file_path) }}"
												class="btn btn-sm btn-outline-success flex-grow-1"
												target="_blank">
												<i class="bi bi-download me-1"></i>Buka
											</a>
											<form action="{{ route('siswa.attachment.delete', $attachment) }}"
												method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-sm btn-outline-danger"
													onclick="return confirm('Hapus lampiran ini?')">
													<i class="bi bi-trash"></i>
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							@if ($attachment->isImage())
								<!-- Image Modal -->
								<div class="modal fade" id="feedbackImageModal{{ $loop->index }}" tabindex="-1">
									<div class="modal-dialog modal-lg modal-dialog-centered">
										<div class="modal-content border-0">
											<div class="modal-header border-0">
												<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											</div>
											<div class="modal-body text-center p-0">
												<img src="{{ asset('storage/' . $attachment->file_path) }}"
													class="img-fluid" alt="{{ $attachment->file_name }}">
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

		<!-- Tanggapan Admin -->
		@include('siswa.laporan.tanggapan')

		<!-- Feedback -->
		@if ($laporan->aspirasi?->status === 'selesai')
			@include('siswa.laporan.feedback')
		@endif
	</div>

	<div class="col-lg-4">
		<!-- Info Card -->
		<div class="card sticky-top" style="top: 80px;">
			<div class="card-header bg-light">
				<h5 class="card-title mb-0">
					<i class="bi bi-info-circle text-info me-2"></i>Informasi
				</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<p class="text-muted small mb-1">ID Laporan</p>
					<p class="fw-bold">{{ $laporan->id }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Tanggal Lapor</p>
					<p class="fw-bold">{{ $laporan->created_at->format('d M Y H:i') }}</p>
				</div>
				<div class="mb-3">
					<p class="text-muted small mb-1">Diperbarui</p>
					<p class="fw-bold">{{ $laporan->updated_at->format('d M Y H:i') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
