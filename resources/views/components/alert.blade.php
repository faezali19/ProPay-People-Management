@props(['type' => 'success'])

@if(session($type))
    <div class="{{ $type === 'success' ? 'bg-green-100 border-green-400 text-green-800' : 'bg-red-100 border-red-400 text-red-800' }} border px-4 py-3 rounded mb-4 text-sm">
        {{ session($type) }}
    </div>
@endif