@auth('admin')
	<div class="flex flex-col md:flex-row md:items-center md:gap-6 space-y-2 md:space-y-0">
		<!-- Dashboard Link -->
		<a href="{{ route('admin.dashboard') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition {{ request()->routeIs('admin.dashboard') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
			Dashboard
		</a>

		<!-- Kategori Link -->
		<a href="{{ route('admin.kategori.index') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition {{ request()->routeIs('admin.kategori.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
			Kategori
		</a>

		<!-- Laporan Link -->
		<a href="{{ route('admin.laporan.index') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition {{ request()->routeIs('admin.laporan.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
			Laporan & Aspirasi
		</a>

		<!-- Dropdown Profile -->
		<div class="relative dropdown-container">
			<button class="dropdown-trigger px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition flex items-center gap-2">
				<span>{{ auth('admin')->user()->nama }}</span>
				<i class="bi bi-chevron-down text-sm"></i>
			</button>
			<div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
				<a href="{{ route('admin.akun') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition first:rounded-t-lg flex items-center gap-2">
					<i class="bi bi-gear"></i>
					<span>Akun Saya</span>
				</a>
				<form action="{{ route('admin.logout') }}" method="POST" class="border-t border-gray-200">
					@csrf
					<button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition last:rounded-b-lg flex items-center gap-2">
						<i class="bi bi-box-arrow-right"></i>
						<span>Logout</span>
					</button>
				</form>
			</div>
		</div>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const dropdownContainer = document.querySelector('.dropdown-container');
			if (!dropdownContainer) return;
			
			const trigger = dropdownContainer.querySelector('.dropdown-trigger');
			const menu = dropdownContainer.querySelector('.dropdown-menu');
			let hideTimeout;
			
			function showDropdown() {
				clearTimeout(hideTimeout);
				menu.classList.remove('hidden');
			}
			
			function hideDropdown() {
				hideTimeout = setTimeout(() => {
					menu.classList.add('hidden');
				}, 150);
			}
			
			trigger.addEventListener('mouseenter', showDropdown);
			trigger.addEventListener('mouseleave', hideDropdown);
			menu.addEventListener('mouseenter', showDropdown);
			menu.addEventListener('mouseleave', hideDropdown);
			
			trigger.addEventListener('click', (e) => {
				e.preventDefault();
				menu.classList.toggle('hidden');
			});
			
			document.addEventListener('click', (e) => {
				if (!dropdownContainer.contains(e.target)) {
					menu.classList.add('hidden');
				}
			});
		});
	</script>
@endauth