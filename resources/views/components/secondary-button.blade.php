@props(['href', 'label'])

<a href="{{ $href }}" class="border-2 border-[#1a1a2e] text-[#1a1a2e] hover:bg-[#1a1a2e] hover:text-white px-8 py-2.5 rounded-lg text-sm font-medium transition">
    {{ $label }}
</a>