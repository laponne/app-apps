@extends('layouts.main')
@section('body')
	@include('layouts.navbar.siswa')
	<main class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-indigo-50">
		<!-- Hero Section -->
		<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
			<div class="grid lg:grid-cols-2 gap-12 items-center">
				<!-- Left Content -->
				<div>
					<h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
						Lapor Sarana Sekolah dengan Mudah
					</h1>
					<p class="text-lg text-gray-600 mb-8">
						Platform digital yang mudah digunakan untuk melaporkan kerusakan, kekurangan, atau permasalahan pada sarana dan prasarana sekolah secara terstruktur dan transparan.
					</p>
					<div class="flex flex-col sm:flex-row gap-3">
						@guest('siswa')
							<a href="{{ route('siswa.login') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg font-medium transition">
								<i class="bi bi-box-arrow-in-right"></i>Masuk Siswa
							</a>
							<a href="{{ route('siswa.register') }}" class="inline-flex items-center justify-center gap-2 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-medium transition">
								<i class="bi bi-person-plus"></i>Daftar Akun
							</a>
						@else
							<a href="{{ route('siswa.dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg font-medium transition">
								<i class="bi bi-speedometer2"></i>Ke Dashboard
							</a>
						@endguest
					</div>
				</div>

				<!-- Right Features Grid -->
				<div class="grid grid-cols-2 gap-4">
					<!-- Feature 1 -->
					<div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition">
						<div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
							<i class="bi bi-file-text text-2xl text-blue-600"></i>
						</div>
						<h3 class="font-semibold text-gray-900 mb-2">Buat Laporan</h3>
						<p class="text-sm text-gray-600">Laporkan masalah dengan mudah dan cepat</p>
					</div>

					<!-- Feature 2 -->
					<div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition">
						<div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
							<i class="bi bi-clock-history text-2xl text-green-600"></i>
						</div>
						<h3 class="font-semibold text-gray-900 mb-2">Pantau Progres</h3>
						<p class="text-sm text-gray-600">Lihat status pengerjaan laporan Anda</p>
					</div>

					<!-- Feature 3 -->
					<div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition">
						<div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
							<i class="bi bi-paperclip text-2xl text-orange-600"></i>
						</div>
						<h3 class="font-semibold text-gray-900 mb-2">Lampirkan Bukti</h3>
						<p class="text-sm text-gray-600">Sertakan foto atau dokumen pendukung</p>
					</div>

					<!-- Feature 4 -->
					<div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition">
						<div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
							<i class="bi bi-graph-up text-2xl text-red-600"></i>
						</div>
						<h3 class="font-semibold text-gray-900 mb-2">Transparansi</h3>
						<p class="text-sm text-gray-600">Lihat perbaikan yang sudah dilakukan</p>
					</div>
				</div>
			</div>
		</section>

		<!-- How It Works Section -->
		<section class="bg-white py-16">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Cara Menggunakan</h2>
				<div class="grid md:grid-cols-4 gap-6">
					<!-- Step 1 -->
					<div class="relative">
						<div class="flex flex-col items-center">
							<div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">1</div>
							<h3 class="font-semibold text-gray-900 mb-2 text-center">Buat Akun</h3>
							<p class="text-sm text-gray-600 text-center">Daftar dengan NIS dan nama Anda</p>
						</div>
					</div>

					<!-- Step 2 -->
					<div class="relative">
						<div class="flex flex-col items-center">
							<div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">2</div>
							<h3 class="font-semibold text-gray-900 mb-2 text-center">Buat Laporan</h3>
							<p class="text-sm text-gray-600 text-center">Pilih kategori dan deskripsikan masalah</p>
						</div>
					</div>

					<!-- Step 3 -->
					<div class="relative">
						<div class="flex flex-col items-center">
							<div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">3</div>
							<h3 class="font-semibold text-gray-900 mb-2 text-center">Sertakan Bukti</h3>
							<p class="text-sm text-gray-600 text-center">Upload foto atau dokumen pendukung</p>
						</div>
					</div>

					<!-- Step 4 -->
					<div class="flex flex-col items-center">
						<div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">4</div>
						<h3 class="font-semibold text-gray-900 mb-2 text-center">Pantau Status</h3>
						<p class="text-sm text-gray-600 text-center">Lihat perkembangan penanganan laporan Anda</p>
					</div>
				</div>
			</div>
		</section>

		<!-- CTA Section -->
		<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
			<div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg shadow-lg p-8 md:p-12 text-center">
				<h2 class="text-3xl font-bold text-white mb-4">Mulai Laporkan Sekarang</h2>
				<p class="text-blue-100 mb-8 max-w-2xl mx-auto">
					Bergabunglah dengan siswa lain dalam membantu meningkatkan sarana dan prasarana sekolah kita bersama
				</p>
				@guest('siswa')
					<a href="{{ route('siswa.register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-semibold transition">
						<i class="bi bi-person-plus"></i>Daftar Gratis
					</a>
				@else
					<a href="{{ route('siswa.laporan.create') }}" class="inline-flex items-center justify-center gap-2 bg-white text-blue-600 hover:bg-blue-50 px-6 py-3 rounded-lg font-semibold transition">
						<i class="bi bi-plus-circle"></i>Buat Laporan Baru
					</a>
				@endguest
			</div>
		</section>

		<!-- Footer -->
		<footer class="bg-gray-900 text-gray-400 py-8 mt-12">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
				<p>&copy; 2026 {{ config('app.name') }}. Semua hak dilindungi.</p>
			</div>
		</footer>
	</main>
@endsection
