<table class="w-full">
	<thead class="bg-gray-50 border-b border-gray-200">
		<tr>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">#</th>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Siswa</th>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Deskripsi</th>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
			<th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
		</tr>
	</thead>
	<tbody class="divide-y divide-gray-200">
		@forelse ($laporan as $item)
			<tr class="hover:bg-gray-50 transition">
				<td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $loop->iteration + $laporan->firstItem() - 1 }}</td>
				<td class="px-6 py-4 text-sm">
					<div class="font-medium text-gray-900">{{ $item->siswa->nama ?? '-' }}</div>
					<div class="text-gray-500 text-xs">{{ $item->siswa->nis ?? '-' }}</div>
				</td>
				<td class="px-6 py-4 text-sm">
					<span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-sm">
						{{ $item->kategori->nama_kategori ?? '-' }}
					</span>
				</td>
				<td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($item->ket, 40) }}</td>
				<td class="px-6 py-4 text-sm">
					@php
						$statusConfig = [
							'selesai' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Selesai'],
							'proses' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'Diproses'],
							'baru' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'Baru']
						];
						$status = $item->status ?? 'baru';
						$config = $statusConfig[$status] ?? $statusConfig['baru'];
					@endphp
					<span class="{{ $config['bg'] }} {{ $config['text'] }} px-2 py-1 rounded text-sm font-medium flex items-center gap-1 w-fit">
						<span class="w-1.5 h-1.5 bg-current rounded-full"></span>
						{{ $config['label'] }}
					</span>
				</td>
				<td class="px-6 py-4 text-sm">
					<a href="{{ route('admin.laporan.show', $item->id) }}" class="inline-flex items-center gap-1 px-3 py-1 text-blue-600 hover:text-blue-700 font-medium border border-blue-600 rounded hover:bg-blue-50 transition">
						<i class="bi bi-eye"></i>Detail
					</a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="6" class="px-6 py-12 text-center">
					<div class="flex flex-col items-center justify-center">
						<i class="bi bi-inbox text-4xl text-gray-400 mb-3"></i>
						<p class="text-gray-500">Belum ada laporan</p>
					</div>
				</td>
			</tr>
		@endforelse
	</tbody>
</table>
