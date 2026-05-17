@props(['label', 'name', 'type' => 'text', 'value' => '', 'placeholder' => ''])

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#1a1a2e]"
    >
</div>