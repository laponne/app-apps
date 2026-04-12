@guest('siswa')
	<div class="flex flex-col md:flex-row md:items-center md:gap-4 space-y-2 md:space-y-0">
		<a href="{{ route('siswa.login') }}" class="px-3 py-2 text-gray-700 hover:text-green-600 font-medium transition">
			Login
		</a>
		<a href="{{ route('siswa.register') }}" class="px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium transition">
			Daftar
		</a>
	</div>
@endguest