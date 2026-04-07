<div class="card mt-4">
	<div class="card-header">
		<h5 class="card-title mb-0">
			<i class="bi bi-list-ul me-2"></i>Daftar Laporan Terbaru
		</h5>
	</div>
	<div class="card-body p-0 table-responsive">
		<table class="table table-hover mb-0">
			<thead>
				<tr>
					<th>#</th>
					<th>Siswa</th>
					<th>Kategori</th>
					<th>Status</th>
					<th>Tanggal Lapor</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($laporanTerbaru ?? [] as $item)
					<tr class="align-middle">
						<td class="fw-bold">{{ $loop->iteration }}</td>
						<td>
							{{ $item->siswa->nama ?? '-' }}
							<br>
							<small class="text-muted">{{ $item->siswa->nis ?? '-' }}</small>
						</td>
						<td>
							<span class="badge bg-light text-dark">
								{{ $item->kategori->nama_kategori ?? '-' }}
							</span>
						</td>
						<td>
							@php
								$statusBadge = $item->aspirasi?->status === 'selesai'
									? 'success' : ($item->aspirasi?->status === 'proses' ? 'warning' : 'secondary');
								$statusLabel = ucfirst($item->aspirasi?->status ?? 'Baru');
							@endphp
							<span class="badge bg-{{ $statusBadge }}">
								<i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>{{ $statusLabel }}
							</span>
						</td>
						<td>
							<small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="5" class="text-center text-muted py-5">
							<i class="bi bi-inbox" style="font-size: 2rem;"></i>
							<p class="mt-3 mb-0">Belum ada laporan</p>
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
