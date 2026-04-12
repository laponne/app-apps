<div class="bg-white rounded-lg shadow overflow-hidden">
	<div class="border-b border-gray-200 px-6 py-4">
		<h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
			<i class="bi bi-list-ul"></i>
			Daftar Laporan Terbaru
		</h3>
	</div>
	<div class="overflow-x-auto">
		<table class="w-full">
			<thead class="bg-gray-50 border-b border-gray-200">
				<tr>
					<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">#</th>
					<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Siswa</th>
					<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
					<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
					<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Tanggal Lapor</th>
				</tr>
			</thead>
			<tbody class="divide-y divide-gray-200">
				@forelse ($laporanTerbaru ?? [] as $item)
					<tr class="hover:bg-gray-50 transition">
						<td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
						<td class="px-6 py-4 text-sm">
							<div class="font-medium text-gray-900">{{ $item->siswa->nama ?? '-' }}</div>
							<div class="text-gray-500 text-xs">{{ $item->siswa->nis ?? '-' }}</div>
						</td>
						<td class="px-6 py-4 text-sm">
							<span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-sm">
								{{ $item->kategori->nama_kategori ?? '-' }}
							</span>
						</td>
						<td class="px-6 py-4 text-sm">
							@php
								$statusConfig = [
									'selesai' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Selesai'],
									'proses' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'Diproses'],
									'baru' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'Baru']
								];
								$status = $item->aspirasi?->status ?? 'baru';
								$config = $statusConfig[$status] ?? $statusConfig['baru'];
							@endphp
							<span class="{{ $config['bg'] }} {{ $config['text'] }} px-2 py-1 rounded text-sm font-medium flex items-center gap-1 w-fit">
								<span class="w-1.5 h-1.5 bg-current rounded-full"></span>
								{{ ucfirst($config['label']) }}
							</span>
						</td>
						<td class="px-6 py-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="5" class="px-6 py-12 text-center">
							<div class="flex flex-col items-center justify-center">
								<i class="bi bi-inbox text-4xl text-gray-400 mb-3"></i>
								<p class="text-gray-500">Belum ada laporan</p>
							</div>
						</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
