@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-900">Edit Kategori Laporan</h1>
		<p class="text-gray-600 mt-1">Perbarui informasi kategori laporan</p>
	</div>

	<div class="max-w-2xl">
		<div class="bg-white rounded-lg shadow p-6">
			<h3 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-2">
				<i class="bi bi-pencil-square"></i>Form Edit Kategori
			</h3>
			<form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="space-y-6">
				@csrf
				@method('PUT')

				<x-input name="nama_kategori" label="Nama Kategori" :value="$kategori->nama_kategori" placeholder="Nama Kategori" />

				<div class="flex gap-3">
					<button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
						<i class="bi bi-check-circle"></i>Perbarui
					</button>
					<a href="{{ route('admin.kategori.index') }}" class="flex-1 border-2 border-gray-300 text-gray-700 hover:bg-gray-50 font-medium py-2 rounded-lg transition flex items-center justify-center gap-2">
						Batal
					</a>
				</div>
			</form>
		</div>
	</div>
@endsection
