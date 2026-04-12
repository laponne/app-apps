@props(['name', 'type' => 'text', 'placeholder' => '', 'value' => null, 'label' => null])
<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition ' . ($errors->has($name) ? 'border-red-500 bg-red-50' : ''),
        ]) }}>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>