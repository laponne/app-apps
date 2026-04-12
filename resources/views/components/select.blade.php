@props([
    'name',
    'label' => null,
    'options' => [],
    'value' => null,
    'placeholder' => '-- Pilih --',
    'valueField' => 'id',
    'labelField' => null,
])
<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    @endif
    <select name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition ' . ($errors->has($name) ? 'border-red-500 bg-red-50' : ''),
        ]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option->{$valueField} }}"
                {{ old($name, $value) == $option->{$valueField} ? 'selected' : '' }}>
                {{ $labelField ? $option->{$labelField} : $option }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>