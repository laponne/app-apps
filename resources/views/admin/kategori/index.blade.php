@extends('layouts.admin')
@section('title', 'Kategori Laporan')
@section('content')
<div class="page-header mt-4 mb-4">
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<h1>Kategori Laporan</h1>
			<p class="mb-0">Kelola kategori pengaduan yang tersedia</p>
		</div>
		<a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
			<i class="bi bi-plus-circle me-2"></i>Tambah Kategori
		</a>
	</div>
</div>

@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show mb-4">
		<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	</div>
@endif

<div class="card">
	<div class="card-body p-0 table-responsive">
		<table class="table table-hover mb-0">
			<thead>
				<tr>
					<th width="50">#</th>
					<th>Nama Kategori</th>
					<th width="200">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($kategori as $item)
					<tr class="align-middle">
						<td class="fw-bold">{{ $loop->iteration }}</td>
						<td>
							<span class="badge bg-light text-dark p-2">
								{{ $item->nama_kategori }}
							</span>
						</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-outline-warning">
									<i class="bi bi-pencil me-1"></i>Edit
								</a>
								<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
									data-bs-target="#deleteModal{{ $item->id }}">
									<i class="bi bi-trash me-1"></i>Hapus
								</button>
							</div>

							<!-- Delete Modal -->
							<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header border-0 bg-danger text-white">
											<h5 class="modal-title">Hapus Kategori</h5>
											<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<p>Apakah Anda yakin ingin menghapus kategori <strong>{{ $item->nama_kategori }}</strong>?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
											<form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="d-inline">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger">Hapus</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="3" class="text-center text-muted py-5">
							<i class="bi bi-inbox" style="font-size: 2rem;"></i>
							<p class="mt-3 mb-0">Belum ada kategori</p>
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="card-footer bg-light">
		{{ $kategori->links() }}
	</div>
</div>
@endsection
