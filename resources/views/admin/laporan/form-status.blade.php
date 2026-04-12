<div class="sticky top-24 bg-white rounded-lg shadow p-6">
	<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
		<i class="bi bi-sliders text-xl text-blue-600"></i>
		<h3 class="text-lg font-semibold text-gray-900">Ubah Status</h3>
	</div>
	<form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-4">
			<label class="block text-sm font-medium text-gray-700 mb-2">Status Laporan</label>
			<select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" required>
				<option value="">-- Pilih Status --</option>
				<option value="proses" {{ $laporan->aspirasi?->status === 'proses' ? 'selected' : '' }}>
					Sedang Diproses
				</option>
				<option value="selesai" {{ $laporan->aspirasi?->status === 'selesai' ? 'selected' : '' }}>
					Selesai
				</option>
			</select>
		</div>

		<button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg font-medium transition flex items-center justify-center gap-2">
			<i class="bi bi-check-circle"></i>Simpan Perubahan
		</button>
	</form>

	<div class="mt-4 bg-blue-50 border-l-4 border-blue-600 p-3 rounded-r-lg">
		<div class="text-blue-900 text-sm flex gap-2">
			<i class="bi bi-info-circle flex-shrink-0"></i>
			<span>Perubahan status akan langsung dikirim notifikasi ke siswa.</span>
		</div>
	</div>
</div>
