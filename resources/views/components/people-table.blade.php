<div class="table-card">
    <table class="table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>SA ID</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>Language</th>
                <th>Interests</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($people as $person)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $person->name }}</td>
                <td>{{ $person->surname }}</td>
                <td>{{ $person->identityDocument->sa_id_number ?? '-' }}</td>
                <td>{{ $person->contactDetail->mobile_number ?? '-' }}</td>
                <td>{{ $person->contactDetail->email_address ?? '-' }}</td>
                <td style="white-space:nowrap">{{ $person->birth_date }}</td>
                <td>{{ $person->language->name ?? '-' }}</td>
                <td>{{ $person->interests->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('people.edit', $person->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete ms-1" onclick="return confirm('Remove this person?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center text-muted py-4">No people added yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>