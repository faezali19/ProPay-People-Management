@props(['type' => 'submit', 'label'])

<button type="{{ $type }}" class="bg-[#1a1a2e] hover:bg-[#e63946] text-white px-8 py-2.5 rounded-lg text-sm font-medium transition">
    {{ $label }}
</button>