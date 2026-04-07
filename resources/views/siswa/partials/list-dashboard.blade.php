<table class="table table-hover mb-0">
	<thead>
		<tr>
			<th>#</th>
			<th>Laporan</th>
			<th>Kategori</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($laporan as $item)
			<tr class="align-middle">
				<td class="fw-bold">{{ $loop->iteration + ($laporan->firstItem() - 1) }}</td>
				<td>
					<p class="mb-1 fw-bold">{{ Str::limit($item->ket, 40) }}</p>
					<small class="text-muted">{{ $item->created_at->format('d M Y H:i') }}</small>
				</td>
				<td>
					<span class="badge bg-light text-dark">
						{{ $item->kategori->nama_kategori ?? '-' }}
					</span>
				</td>
				<td>
					@if ($item->status == 'proses')
						<span class="badge bg-warning text-dark">
							<i class="bi bi-hourglass-split me-1" style="font-size: 0.5rem;"></i>Diproses
						</span>
					@elseif ($item->status == 'selesai')
						<span class="badge bg-success">
							<i class="bi bi-check-circle me-1" style="font-size: 0.5rem;"></i>Selesai
						</span>
					@else
						<span class="badge bg-secondary">
							<i class="bi bi-clock me-1" style="font-size: 0.5rem;"></i>Menunggu
						</span>
					@endif
				</td>
				<td>
					<a href="{{ route('siswa.laporan.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
						<i class="bi bi-eye me-1"></i>Detail
					</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5" class="text-center text-muted py-5">
					<i class="bi bi-inbox" style="font-size: 2rem;"></i>
					<p class="mt-3 mb-0">Belum ada laporan. Mulai dengan <a href="{{ route('siswa.laporan.create') }}" class="text-primary fw-bold text-decoration-none">membuat laporan baru</a></p>
				</td>
			</tr>
		@endforelse
	</tbody>
</table>
