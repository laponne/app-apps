<div class="card mb-4">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-chat-left-text me-2"></i>Status Tanggapan
		</h5>
	</div>
	<div class="card-body">
		@if ($laporan->aspirasi?->status === 'selesai')
			<div class="alert alert-success d-flex align-items-center gap-3 border-0 mb-0">
				<i class="bi bi-check-circle-fill" style="font-size: 1.5rem;"></i>
				<div>
					<strong>Laporan Selesai</strong>
					<p class="small mb-0">Admin telah menyelesaikan penanganan laporan Anda. Terima kasih!</p>
				</div>
			</div>
		@elseif ($laporan->aspirasi?->status === 'proses')
			<div class="alert alert-info d-flex align-items-center gap-3 border-0 mb-0">
				<i class="bi bi-hourglass-split" style="font-size: 1.5rem;"></i>
				<div>
					<strong>Sedang Diproses</strong>
					<p class="small mb-0">Admin sedang menangani laporan Anda. Mohon menunggu sebentar.</p>
				</div>
			</div>
		@else
			<div class="alert alert-warning d-flex align-items-center gap-3 border-0 mb-3">
				<i class="bi bi-clock" style="font-size: 1.5rem;"></i>
				<div>
					<strong>Menunggu Respons Admin</strong>
					<p class="small mb-0">Laporan Anda baru saja diterima dan akan ditinjau segera.</p>
				</div>
			</div>
			<form action="{{ route('siswa.laporan.destroy', $laporan->id) }}" method="POST" class="d-inline"
				onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
				@csrf
				@method('DELETE')
				<button class="btn btn-sm btn-outline-danger">
					<i class="bi bi-trash me-1"></i>Hapus Laporan
				</button>
			</form>
		@endif
	</div>
</div>
