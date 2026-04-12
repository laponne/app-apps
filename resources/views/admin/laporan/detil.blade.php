<!-- Informasi Siswa -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
	<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
		<i class="bi bi-person-circle text-xl text-blue-600"></i>
		<h3 class="text-lg font-semibold text-gray-900">Informasi Siswa</h3>
	</div>
	<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">Nama Siswa</p>
			<p class="font-semibold text-gray-900">{{ $laporan->siswa->nama }}</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">NIS</p>
			<p class="font-semibold text-gray-900">{{ $laporan->siswa->nis }}</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">Kelas</p>
			<p class="font-semibold text-gray-900">{{ $laporan->siswa->kelas }}</p>
		</div>
	</div>
</div>

<!-- Detail Laporan -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
	<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
		<i class="bi bi-file-text text-xl text-blue-600"></i>
		<h3 class="text-lg font-semibold text-gray-900">Detail Laporan</h3>
	</div>
	<div class="space-y-4">
		<div>
			<p class="text-xs text-gray-500 mb-2 font-medium">Kategori</p>
			<span class="inline-flex px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
				{{ $laporan->kategori->nama_kategori }}
			</span>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">Lokasi Kejadian</p>
			<p class="font-semibold text-gray-900">{{ $laporan->lokasi }}</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">Deskripsi Masalah</p>
			<p class="text-gray-700 whitespace-pre-wrap">{{ $laporan->ket }}</p>
		</div>
		<div>
			<p class="text-xs text-gray-500 mb-1 font-medium">Tanggal Pengaduan</p>
			<p class="font-semibold text-gray-900">{{ $laporan->created_at->format('d M Y H:i') }}</p>
		</div>
		<div class="border-t border-gray-200 pt-4">
			<p class="text-xs text-gray-500 mb-2 font-medium">Status Laporan</p>
			@if ($laporan->aspirasi?->status === 'selesai')
				<span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
					<i class="bi bi-check-circle"></i>Selesai
				</span>
			@elseif ($laporan->aspirasi?->status === 'proses')
				<span class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
					<i class="bi bi-hourglass-split"></i>Sedang Diproses
				</span>
			@else
				<span class="inline-flex items-center gap-1 px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
					<i class="bi bi-clock"></i>Belum Diproses
				</span>
			@endif
		</div>
		@if ($laporan->feedback)
			<div class="pt-2">
				<p class="text-xs text-gray-500 mb-2 font-medium">Feedback Kepuasan</p>
				<span class="inline-flex px-3 py-1 bg-cyan-100 text-cyan-800 rounded-full text-sm font-medium">
					{{ ucfirst($laporan->feedback) }}
				</span>
			</div>
		@endif
	</div>
</div>

<!-- Lampiran Bukti -->
@if ($laporan->attachments->count() > 0)
	<div class="bg-white rounded-lg shadow p-6">
		<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
			<i class="bi bi-paperclip text-xl text-blue-600"></i>
			<h3 class="text-lg font-semibold text-gray-900">Lampiran Bukti ({{ $laporan->attachments->count() }})</h3>
		</div>
		<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
			@foreach ($laporan->attachments as $attachment)
				<div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
					@if ($attachment->isImage())
						<div class="relative overflow-hidden bg-gray-100 h-24 cursor-pointer group" onclick="document.getElementById('imageModal{{ $loop->index }}').classList.remove('hidden')">
							<img src="{{ asset('storage/' . $attachment->file_path) }}"
								class="w-full h-full object-cover group-hover:scale-105 transition"
								alt="{{ $attachment->file_name }}">
							<div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition flex items-center justify-center">
								<i class="bi bi-eye text-white opacity-0 group-hover:opacity-100 transition"></i>
							</div>
						</div>
					@else
						<div class="bg-gray-100 h-24 flex items-center justify-center">
							<i class="bi bi-file-pdf text-3xl text-red-500"></i>
						</div>
					@endif
					<div class="p-2">
						<p class="text-xs text-gray-700 truncate font-medium" title="{{ $attachment->file_name }}">
							{{ $attachment->file_name }}
						</p>
						<p class="text-xs text-gray-500 mb-2">{{ $attachment->formatFileSize() }}</p>
						<a href="{{ asset('storage/' . $attachment->file_path) }}"
							class="block w-full text-center px-2 py-1 text-xs border border-blue-600 text-blue-600 hover:bg-blue-50 rounded transition font-medium"
							target="_blank">
							<i class="bi bi-download"></i> Buka
						</a>
					</div>
				</div>

				@if ($attachment->isImage())
					<!-- Image Modal -->
					<div id="imageModal{{ $loop->index }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" onclick="if(event.target===this) this.classList.add('hidden')">
						<div class="bg-white rounded-lg max-w-2xl w-full max-h-96 overflow-auto">
							<div class="flex justify-between items-center p-4 border-b border-gray-200">
								<h3 class="text-sm font-semibold text-gray-900">{{ $attachment->file_name }}</h3>
								<button onclick="document.getElementById('imageModal{{ $loop->index }}').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
									<i class="bi bi-x text-2xl"></i>
								</button>
							</div>
							<div class="p-4 text-center">
								<img src="{{ asset('storage/' . $attachment->file_path) }}"
									class="max-w-full max-h-96 mx-auto" alt="{{ $attachment->file_name }}">
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
@endif
