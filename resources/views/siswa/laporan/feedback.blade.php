<div class="bg-white rounded-lg shadow p-6 mb-6">
	<div class="flex items-center gap-2 mb-4 border-b border-gray-200 pb-4">
		<i class="bi bi-star-fill text-xl text-yellow-500"></i>
		<h3 class="text-lg font-semibold text-gray-900">Feedback Kepuasan</h3>
	</div>
	@if ($laporan->aspirasi->feedback)
		{{-- SUDAH MEMBERI FEEDBACK --}}
		<div class="bg-green-50 border-l-4 border-green-600 p-4 flex gap-3">
			<i class="bi bi-check-circle-fill text-2xl text-green-600 flex-shrink-0"></i>
			<div>
				<p class="text-xs text-gray-500 mb-1 font-medium">Feedback Anda:</p>
				<strong class="text-lg text-green-900">
					@php
						$feedbackList = [
							1 => 'Tidak Puas',
							2 => 'Kurang Puas',
							3 => 'Cukup Puas',
							4 => 'Puas',
							5 => 'Sangat Puas',
						];
					@endphp
					{{ $feedbackList[$laporan->aspirasi->feedback] ?? '-' }}
				</strong>
			</div>
		</div>
	@else
		{{-- BELUM MEMBERI FEEDBACK --}}
		<p class="text-gray-600 text-sm mb-6">Bantulah kami berkembang dengan memberikan feedback tentang kepuasan Anda terhadap penyelesaian laporan ini.</p>
		<form action="{{ route('siswa.laporan.feedback', $laporan->aspirasi->id) }}" method="POST"
			enctype="multipart/form-data">
			@csrf

			<div class="mb-6">
				<label class="block text-sm font-medium text-gray-700 mb-3">Pilih Tingkat Kepuasan</label>
				<div class="space-y-2">
					<div class="flex items-center">
						<input class="w-4 h-4 text-emerald-600 rounded focus:ring-2 focus:ring-emerald-500" type="radio" name="feedback" value="1" id="feedback1">
						<label class="ml-3 text-sm text-gray-700 cursor-pointer flex items-center gap-2" for="feedback1">
							<i class="bi bi-emoji-frown text-red-500"></i>Tidak Puas
						</label>
					</div>
					<div class="flex items-center">
						<input class="w-4 h-4 text-emerald-600 rounded focus:ring-2 focus:ring-emerald-500" type="radio" name="feedback" value="2" id="feedback2">
						<label class="ml-3 text-sm text-gray-700 cursor-pointer flex items-center gap-2" for="feedback2">
							<i class="bi bi-emoji-neutral text-yellow-500"></i>Kurang Puas
						</label>
					</div>
					<div class="flex items-center">
						<input class="w-4 h-4 text-emerald-600 rounded focus:ring-2 focus:ring-emerald-500" type="radio" name="feedback" value="3" id="feedback3">
						<label class="ml-3 text-sm text-gray-700 cursor-pointer flex items-center gap-2" for="feedback3">
							<i class="bi bi-emoji-smile text-blue-500"></i>Cukup Puas
						</label>
					</div>
					<div class="flex items-center">
						<input class="w-4 h-4 text-emerald-600 rounded focus:ring-2 focus:ring-emerald-500" type="radio" name="feedback" value="4" id="feedback4">
						<label class="ml-3 text-sm text-gray-700 cursor-pointer flex items-center gap-2" for="feedback4">
							<i class="bi bi-emoji-smile-fill text-green-500"></i>Puas
						</label>
					</div>
					<div class="flex items-center">
						<input class="w-4 h-4 text-emerald-600 rounded focus:ring-2 focus:ring-emerald-500" type="radio" name="feedback" value="5" id="feedback5">
						<label class="ml-3 text-sm text-gray-700 cursor-pointer flex items-center gap-2" for="feedback5">
							<i class="bi bi-emoji-laughing text-green-600"></i>Sangat Puas
						</label>
					</div>
				</div>
				@error('feedback')
					<div class="text-red-600 text-sm mt-2">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="mb-6">
				<label for="bukti" class="block text-sm font-medium text-gray-700 mb-2">
					Lampirkan Bukti Selesai <span class="text-red-600">*</span>
				</label>
				<input type="file" name="bukti" id="bukti" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('bukti') border-red-500 @enderror"
					required accept="image/*,application/pdf">
				<small class="text-gray-500 text-xs mt-1 block">Format: JPG, PNG, PDF | Maks 5MB</small>
				@error('bukti')
					<div class="text-red-600 text-sm mt-2">
						{{ $message }}
					</div>
				@enderror
			</div>

			<button class="w-full px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white rounded-lg font-medium transition flex items-center justify-center gap-2">
				<i class="bi bi-check-circle"></i>Kirim Feedback
			</button>
		</form>
	@endif
</div>
