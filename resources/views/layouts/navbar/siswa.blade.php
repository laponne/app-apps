<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center h-16">
			<!-- Logo -->
			<a href="{{ route('welcome') }}" class="flex items-center gap-2 text-lg font-bold text-green-600 hover:text-green-700 transition">
				<i class="bi bi-speedometer2"></i>
				<span>{{ config('app.name') }}</span>
			</a>

			<!-- Desktop Menu -->
			<div class="hidden md:flex items-center gap-8">
				@include('layouts.nav-items.siswa-guest')
				@include('layouts.nav-items.siswa-auth')
			</div>

			<!-- Mobile Menu Button -->
			<button id="mobile-menu-btn" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition">
				<i class="bi bi-list text-xl"></i>
			</button>
		</div>

		<!-- Mobile Menu -->
		<div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-gray-200">
			@include('layouts.nav-items.siswa-guest')
			@include('layouts.nav-items.siswa-auth')
		</div>
	</div>
</nav>

<script>
	document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
		document.getElementById('mobile-menu').classList.toggle('hidden');
	});
</script>