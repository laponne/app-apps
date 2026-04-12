@extends('layouts.siswa')
@section('title', 'Buat Laporan Pengaduan')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Buat Laporan Pengaduan</h1>
		<p class="text-gray-600 mt-1">Laporkan masalah pada sarana dan prasarana sekolah dengan detail yang jelas</p>
	</div>

	<div class="grid lg:grid-cols-3 gap-8">
		<!-- Form Column -->
		<div class="lg:col-span-2">
			<div class="bg-white rounded-lg shadow p-6">
				<form action="{{ route('siswa.laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
					@csrf

					<!-- Category Select -->
					<x-select label="Kategori" name="kategori_id"
						:options="$kategori" labelField="nama_kategori" />

					<!-- Location Input -->
					<x-input label="Lokasi Kejadian" name="lokasi"
						placeholder="Contoh: Ruang Kelas X PPLG 1" />

					<!-- Description Textarea -->
					<x-textarea label="Keterangan Masalah" name="ket"
						placeholder="Jelaskan masalah atau kerusakan yang terjadi secara detail..." rows="5" />

					<!-- File Upload -->
					<div>
						<div class="flex items-center gap-2 mb-2">
							<label class="block text-sm font-medium text-gray-700">Lampiran Bukti</label>
							<span class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded font-medium">Opsional</span>
						</div>
						<input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('attachments.*') border-red-500 bg-red-50 @enderror"
							name="attachments[]" multiple accept=".jpg,.jpeg,.png,.pdf">
						<div class="mt-2 text-xs text-gray-500">
							<i class="bi bi-info-circle me-1"></i>
							Format: JPG, JPEG, PNG, PDF | Maksimal 5MB per file | Bisa upload lebih dari 1 file
						</div>
						@error('attachments.*')
							<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
						@enderror
					</div>

					<!-- Action Buttons -->
					<div class="flex gap-3 pt-4">
						<button type="submit" class="flex-1 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
							<i class="bi bi-send"></i>Kirim Laporan
						</button>
						<a href="{{ route('siswa.dashboard') }}" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
							Batal
						</a>
					</div>
				</form>
			</div>
		</div>

		<!-- Info Sidebar -->
		<div class="lg:col-span-1">
			<div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
				<h3 class="font-semibold text-blue-900 mb-4 flex items-center gap-2">
					<i class="bi bi-info-circle-fill"></i>Tips Membuat Laporan
				</h3>
				<ul class="space-y-3 text-sm text-blue-800">
					<li class="flex gap-2">
						<i class="bi bi-check-circle flex-shrink-0 mt-0.5"></i>
						<span>Jelaskan masalah secara detail dan jelas</span>
					</li>
					<li class="flex gap-2">
						<i class="bi bi-check-circle flex-shrink-0 mt-0.5"></i>
						<span>Sertakan lokasi kejadian yang spesifik</span>
					</li>
					<li class="flex gap-2">
						<i class="bi bi-check-circle flex-shrink-0 mt-0.5"></i>
						<span>Lampirkan foto untuk membuktikan masalah</span>
					</li>
					<li class="flex gap-2">
						<i class="bi bi-check-circle flex-shrink-0 mt-0.5"></i>
						<span>Pilih kategori yang paling sesuai</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
