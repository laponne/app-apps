<div class="bg-white rounded-lg shadow p-6 mb-6">
	<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
		<i class="bi bi-chat-left-text text-xl text-emerald-600"></i>
		<h3 class="text-lg font-semibold text-gray-900">Status Tanggapan</h3>
	</div>
	@if ($laporan->aspirasi?->status === 'selesai')
		<div class="bg-green-50 border-l-4 border-green-600 p-4 flex gap-3">
			<i class="bi bi-check-circle-fill text-2xl text-green-600 flex-shrink-0"></i>
			<div>
				<strong class="text-green-900">Laporan Selesai</strong>
				<p class="text-sm text-green-800 mb-0">Admin telah menyelesaikan penanganan laporan Anda. Terima kasih!</p>
			</div>
		</div>
	@elseif ($laporan->aspirasi?->status === 'proses')
		<div class="bg-blue-50 border-l-4 border-blue-600 p-4 flex gap-3">
			<i class="bi bi-hourglass-split text-2xl text-blue-600 flex-shrink-0"></i>
			<div>
				<strong class="text-blue-900">Sedang Diproses</strong>
				<p class="text-sm text-blue-800 mb-0">Admin sedang menangani laporan Anda. Mohon menunggu sebentar.</p>
			</div>
		</div>
	@else
		<div class="bg-yellow-50 border-l-4 border-yellow-600 p-4 flex gap-3 mb-4">
			<i class="bi bi-clock text-2xl text-yellow-600 flex-shrink-0"></i>
			<div>
				<strong class="text-yellow-900">Menunggu Respons Admin</strong>
				<p class="text-sm text-yellow-800 mb-0">Laporan Anda baru saja diterima dan akan ditinjau segera.</p>
			</div>
		</div>
		<form action="{{ route('siswa.laporan.destroy', $laporan->id) }}" method="POST" class="inline"
			onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
			@csrf
			@method('DELETE')
			<button class="px-3 py-1 text-sm border border-red-600 text-red-600 hover:bg-red-50 rounded font-medium transition">
				<i class="bi bi-trash"></i> Hapus Laporan
			</button>
		</form>
	@endif
</div>

