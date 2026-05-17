<div class="bg-white/95 rounded-xl shadow-2xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#1a1a2e] text-white">
            <tr>
                <th class="px-4 py-4 text-left text-xs font-semibold">#</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Name</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Surname</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">SA ID</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Mobile</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Email</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Birth Date</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Language</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Interests</th>
                <th class="px-4 py-4 text-left text-xs font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($people as $person)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                <td class="px-4 py-3 text-sm text-gray-500">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm text-gray-800 font-medium">{{ $person->name }}</td>
                <td class="px-4 py-3 text-sm text-gray-800">{{ $person->surname }}</td>
                <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">{{ $person->identityDocument->sa_id_number ?? '-' }}</td>
                <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">{{ $person->contactDetail->mobile_number ?? '-' }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $person->contactDetail->email_address ?? '-' }}</td>
                <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">{{ $person->birth_date }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $person->language->name ?? '-' }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $person->interests->pluck('name')->join(', ') }}</td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <a href="{{ route('people.edit', $person->id) }}" class="bg-[#1a1a2e] hover:bg-[#e63946] text-white text-xs px-3 py-1.5 rounded transition">Edit</a>
                    <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Remove this person?')" class="bg-[#e63946] hover:bg-red-700 text-white text-xs px-3 py-1.5 rounded transition ml-1">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="px-4 py-8 text-center text-gray-400 text-sm">No people added yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>