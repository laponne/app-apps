@extends('layouts.admin')
@section('title', 'Kategori Laporan')
@section('content')
	<!-- Page Header -->
	<div class="flex flex-col md:flex-row md:justify-between md:items-start mb-8">
		<div>
			<h1 class="text-3xl font-bold text-gray-900">Kategori Laporan</h1>
			<p class="text-gray-600 mt-1">Kelola kategori pengaduan yang tersedia</p>
		</div>
		<a href="{{ route('admin.kategori.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2 rounded-lg font-medium transition">
			<i class="bi bi-plus-circle"></i>Tambah Kategori
		</a>
	</div>

	<!-- Success Alert -->
	@if (session('success'))
		<div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start gap-3">
			<i class="bi bi-check-circle text-green-600 text-xl flex-shrink-0 mt-0.5"></i>
			<p class="text-green-800">{{ session('success') }}</p>
		</div>
	@endif

	<!-- Categories Table -->
	<div class="bg-white rounded-lg shadow overflow-hidden">
		<div class="overflow-x-auto">
			<table class="w-full">
				<thead class="bg-gray-50 border-b border-gray-200">
					<tr>
						<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 w-12">#</th>
						<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 flex-1">Nama Kategori</th>
						<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-200">
					@forelse ($kategori as $item)
						<tr class="hover:bg-gray-50 transition">
							<td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
							<td class="px-6 py-4 text-sm">
								<span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
									{{ $item->nama_kategori }}
								</span>
							</td>
							<td class="px-6 py-4 text-sm">
								<div class="flex items-center gap-2">
									<!-- Edit Button -->
									<a href="{{ route('admin.kategori.edit', $item->id) }}" class="px-3 py-1 text-orange-600 hover:text-orange-700 border border-orange-600 rounded hover:bg-orange-50 font-medium transition inline-flex items-center gap-1">
										<i class="bi bi-pencil"></i>Edit
									</a>

									<!-- Delete Button -->
									<button type="button" class="px-3 py-1 text-red-600 hover:text-red-700 border border-red-600 rounded hover:bg-red-50 font-medium transition inline-flex items-center gap-1 delete-btn" data-category-id="{{ $item->id }}" data-category-name="{{ $item->nama_kategori }}">
										<i class="bi bi-trash"></i>Hapus
									</button>
								</div>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3" class="px-6 py-12 text-center">
								<div class="flex flex-col items-center justify-center">
									<i class="bi bi-inbox text-4xl text-gray-400 mb-3"></i>
									<p class="text-gray-500">Belum ada kategori</p>
								</div>
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
			{{ $kategori->links() }}
		</div>
	</div>

	<!-- Delete Modal -->
	<div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 p-4">
		<div class="bg-white rounded-lg shadow-xl max-w-sm w-full animate-in">
			<!-- Modal Header -->
			<div class="bg-red-600 text-white px-6 py-4 rounded-t-lg">
				<h3 class="text-lg font-semibold flex items-center gap-2">
					<i class="bi bi-exclamation-triangle"></i>Hapus Kategori
				</h3>
			</div>
			<!-- Modal Body -->
			<div class="px-6 py-4">
				<p class="text-gray-700">Apakah Anda yakin ingin menghapus kategori <strong id="categoryName"></strong>?</p>
			</div>
			<!-- Modal Footer -->
			<div class="bg-gray-50 px-6 py-4 rounded-b-lg flex gap-2 border-t border-gray-200">
				<button type="button" class="flex-1 px-4 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition font-medium cancel-btn">Batal</button>
				<form id="deleteForm" action="" method="POST" class="flex-1">
					@csrf
					@method('DELETE')
					<button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">Hapus</button>
				</form>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const deleteButtons = document.querySelectorAll('.delete-btn');
			const deleteModal = document.getElementById('deleteModal');
			const categoryName = document.getElementById('categoryName');
			const deleteForm = document.getElementById('deleteForm');
			const cancelBtn = document.querySelector('.cancel-btn');

			deleteButtons.forEach(btn => {
				btn.addEventListener('click', function() {
					const categoryId = this.dataset.categoryId;
					const catName = this.dataset.categoryName;
					
					categoryName.textContent = catName;
					deleteForm.action = '{{ url("admin/kategori") }}/' + categoryId;
					deleteModal.classList.remove('hidden');
				});
			});

			cancelBtn.addEventListener('click', function() {
				deleteModal.classList.add('hidden');
			});

			deleteModal.addEventListener('click', function(e) {
				if (e.target === this) {
					deleteModal.classList.add('hidden');
				}
			});
		});
	</script>
@endsection
