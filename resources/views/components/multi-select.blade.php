@props(['label', 'name', 'options', 'selected' => []])

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>
    <div class="flex flex-wrap gap-3">
        @foreach($options as $option)
            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                <input
                    type="checkbox"
                    name="{{ $name }}[]"
                    value="{{ $option->id }}"
                    {{ in_array($option->id, (array) $selected) ? 'checked' : '' }}
                    class="rounded border-gray-300"
                >
                {{ $option->name }}
            </label>
        @endforeach
    </div>
</div>