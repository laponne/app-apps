@extends('layouts.siswa')
@section('title', 'Detail Laporan Pengaduan')
@section('content')
<div class="flex flex-col md:flex-row md:justify-between md:items-start mb-8 mt-4">
	<div>
		<h1 class="text-3xl font-bold text-gray-900">Detail Laporan Pengaduan</h1>
		<p class="text-gray-600 mt-1">Pantau progres penanganan laporan Anda</p>
	</div>
	<a href="{{ route('siswa.dashboard') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition">
		<i class="bi bi-arrow-left"></i>Kembali
	</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
	<div class="lg:col-span-2">
		<!-- Detail Laporan -->
		<div class="bg-white rounded-lg shadow p-6 mb-6">
			<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
				<i class="bi bi-file-text text-xl text-emerald-600"></i>
				<h3 class="text-lg font-semibold text-gray-900">Detail Laporan</h3>
			</div>
			<div class="space-y-4">
				<div>
					<p class="text-xs text-gray-500 mb-1 font-medium">Kategori</p>
					<span class="inline-flex px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium">
						{{ $laporan->kategori->nama_kategori ?? '-' }}
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
							<i class="bi bi-clock"></i>Menunggu
						</span>
					@endif
				</div>
			</div>
		</div>

		<!-- Lampiran Bukti Laporan -->
		@php
			$lampiranLaporan = $laporan->attachments->where('type', 'laporan');
			$lampiranFeedback = $laporan->attachments->where('type', 'feedback');
		@endphp

		@if ($lampiranLaporan->count() > 0)
			<div class="bg-white rounded-lg shadow p-6 mb-6">
				<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
					<i class="bi bi-paperclip text-xl text-emerald-600"></i>
					<h3 class="text-lg font-semibold text-gray-900">Lampiran Bukti Laporan ({{ $lampiranLaporan->count() }})</h3>
				</div>
				<div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
					@foreach ($lampiranLaporan as $attachment)
						<div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
							@if ($attachment->isImage())
								<div class="relative overflow-hidden bg-gray-100 h-32 cursor-pointer group" onclick="document.getElementById('imageModal{{ $loop->index }}').classList.remove('hidden')">
									<img src="{{ asset('storage/' . $attachment->file_path) }}"
										class="w-full h-full object-cover group-hover:scale-105 transition"
										alt="{{ $attachment->file_name }}">
									<div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition flex items-center justify-center">
										<i class="bi bi-eye text-white opacity-0 group-hover:opacity-100 transition"></i>
									</div>
								</div>
							@else
								<div class="bg-gray-100 h-32 flex items-center justify-center">
									<i class="bi bi-file-pdf text-3xl text-red-500"></i>
								</div>
							@endif
							<div class="p-2">
								<p class="text-xs text-gray-700 truncate font-medium" title="{{ $attachment->file_name }}">
									{{ $attachment->file_name }}
								</p>
								<p class="text-xs text-gray-500 mb-2">{{ $attachment->formatFileSize() }}</p>
								<div class="flex gap-1">
									<a href="{{ asset('storage/' . $attachment->file_path) }}"
										class="flex-1 text-center px-2 py-1 text-xs border border-emerald-600 text-emerald-600 hover:bg-emerald-50 rounded transition font-medium"
										target="_blank">
										<i class="bi bi-download"></i> Buka
									</a>
									<form action="{{ route('siswa.attachment.delete', $attachment) }}"
										method="POST" class="inline">
										@csrf
										@method('DELETE')
										<button type="submit" class="px-2 py-1 text-xs border border-red-600 text-red-600 hover:bg-red-50 rounded transition font-medium"
											onclick="return confirm('Hapus lampiran ini?')">
											<i class="bi bi-trash"></i>
										</button>
									</form>
								</div>
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

		<!-- Lampiran Bukti Feedback -->
		@if ($lampiranFeedback->count() > 0)
			<div class="bg-white rounded-lg shadow p-6 mb-6">
				<div class="flex items-center gap-2 mb-4 border-b border-green-200 pb-4">
					<i class="bi bi-check-circle text-xl text-green-600"></i>
					<h3 class="text-lg font-semibold text-gray-900">Lampiran Bukti Selesai ({{ $lampiranFeedback->count() }})</h3>
				</div>
				<div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
					@foreach ($lampiranFeedback as $attachment)
						<div class="border-2 border-green-200 rounded-lg overflow-hidden hover:shadow-md transition bg-green-50">
							@if ($attachment->isImage())
								<div class="relative overflow-hidden bg-gray-100 h-32 cursor-pointer group" onclick="document.getElementById('feedbackImageModal{{ $loop->index }}').classList.remove('hidden')">
									<img src="{{ asset('storage/' . $attachment->file_path) }}"
										class="w-full h-full object-cover group-hover:scale-105 transition"
										alt="{{ $attachment->file_name }}">
									<div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition flex items-center justify-center">
										<i class="bi bi-eye text-white opacity-0 group-hover:opacity-100 transition"></i>
									</div>
								</div>
							@else
								<div class="bg-gray-100 h-32 flex items-center justify-center">
									<i class="bi bi-file-pdf text-3xl text-red-500"></i>
								</div>
							@endif
							<div class="p-2">
								<p class="text-xs text-gray-700 truncate font-medium" title="{{ $attachment->file_name }}">
									{{ $attachment->file_name }}
								</p>
								<p class="text-xs text-gray-500 mb-2">{{ $attachment->formatFileSize() }}</p>
								<div class="flex gap-1">
									<a href="{{ asset('storage/' . $attachment->file_path) }}"
										class="flex-1 text-center px-2 py-1 text-xs border border-green-600 text-green-600 hover:bg-green-100 rounded transition font-medium"
										target="_blank">
										<i class="bi bi-download"></i> Buka
									</a>
									<form action="{{ route('siswa.attachment.delete', $attachment) }}"
										method="POST" class="inline">
										@csrf
										@method('DELETE')
										<button type="submit" class="px-2 py-1 text-xs border border-red-600 text-red-600 hover:bg-red-50 rounded transition font-medium"
											onclick="return confirm('Hapus lampiran ini?')">
											<i class="bi bi-trash"></i>
										</button>
									</form>
								</div>
							</div>
						</div>

						@if ($attachment->isImage())
							<!-- Image Modal -->
							<div id="feedbackImageModal{{ $loop->index }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" onclick="if(event.target===this) this.classList.add('hidden')">
								<div class="bg-white rounded-lg max-w-2xl w-full max-h-96 overflow-auto">
									<div class="flex justify-between items-center p-4 border-b border-gray-200">
										<h3 class="text-sm font-semibold text-gray-900">{{ $attachment->file_name }}</h3>
										<button onclick="document.getElementById('feedbackImageModal{{ $loop->index }}').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
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

		<!-- Tanggapan Admin -->
		@include('siswa.laporan.tanggapan')

		<!-- Feedback -->
		@if ($laporan->aspirasi?->status === 'selesai')
			@include('siswa.laporan.feedback')
		@endif
	</div>

	<!-- Info Card Sidebar -->
	<div class="lg:col-span-1">
		<div class="sticky top-24 bg-white rounded-lg shadow p-6">
			<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
				<i class="bi bi-info-circle text-xl text-cyan-600"></i>
				<h3 class="text-lg font-semibold text-gray-900">Informasi</h3>
			</div>
			<div class="space-y-4">
				<div>
					<p class="text-xs text-gray-500 mb-1 font-medium">ID Laporan</p>
					<p class="font-semibold text-gray-900 font-mono">{{ $laporan->id }}</p>
				</div>
				<div>
					<p class="text-xs text-gray-500 mb-1 font-medium">Tanggal Lapor</p>
					<p class="font-semibold text-gray-900">{{ $laporan->created_at->format('d M Y H:i') }}</p>
				</div>
				<div>
					<p class="text-xs text-gray-500 mb-1 font-medium">Diperbarui</p>
					<p class="font-semibold text-gray-900">{{ $laporan->updated_at->format('d M Y H:i') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
