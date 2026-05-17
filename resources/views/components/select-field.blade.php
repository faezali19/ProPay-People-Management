@props(['label', 'name', 'options', 'selected' => null])

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ $label }}</label>
    <select name="{{ $name }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#1a1a2e]">
        <option value="">Select {{ $label }}</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $selected == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>