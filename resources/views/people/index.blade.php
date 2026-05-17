<!DOCTYPE html>
<html>
<head>
    <title>ProPay | People</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            margin: 0;
        }
        .navbar {
            background-color: #1a1a2e;
            padding: 12px 30px;
        }
        .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 22px;
        }
        .navbar-brand span {
            color: #e63946;
        }
        .nav-user {
            color: #ccc;
            font-size: 14px;
            margin-right: 15px;
        }
        .btn-logout {
            background-color: #e63946;
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-logout:hover {
            background-color: #c1121f;
            color: white;
        }
        .main-container {
            padding: 30px;
        }
        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }
        .page-subtitle {
            color: rgba(255,255,255,0.6);
            font-size: 14px;
            margin-bottom: 25px;
        }
        .btn-add {
            background-color: #e63946;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-add:hover {
            background-color: white;
            color: #e63946;
        }
        .table-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            overflow: hidden;
            margin-top: 20px;
        }
        .table thead {
            background-color: #1a1a2e;
            color: white;
        }
        .table thead th {
            font-weight: 600;
            font-size: 13px;
            padding: 14px 16px;
            border: none;
        }
        .table tbody td {
            padding: 12px 16px;
            font-size: 14px;
            color: #444;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-edit {
            background-color: #1a1a2e;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 12px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #e63946;
            color: white;
        }
        .btn-delete {
            background-color: #e63946;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 12px;
        }
        .btn-delete:hover {
            background-color: #c1121f;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <span class="navbar-brand">Pro<span>Pay</span> SA</span>
        <div class="d-flex align-items-center">
            <span class="nav-user">Welcome, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

        <!-- Stats Bar -->
    <div style="background-color: #1a1a2e; border-top: 1px solid #2d2d4e; padding: 12px 30px;">
        <span style="color: #aaa; font-size: 13px;">Total People in System: </span>
        <span style="color: white; font-weight: 700; font-size: 13px;">{{ $people->count() }}</span>
    </div>

    <div class="main-container">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <p class="page-title">People Management</p>
                <p class="page-subtitle">Manage all registered people in the system</p>
            </div>
            <a href="{{ route('people.create') }}" class="btn-add">+ Add New Person</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

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
                        <td>{{ $person->sa_id_number }}</td>
                        <td>{{ $person->mobile_number }}</td>
                        <td>{{ $person->email_address }}</td>
                        <td>{{ $person->birth_date }}</td>
                        <td>{{ $person->language }}</td>
                        <td>{{ $person->interests }}</td>
                        <td>
                            <a href="{{ route('people.edit', $person->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete ms-1" onclick="return confirm('Are you sure you want to delete this person?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">No people added yet. Click "Add New Person" to get started.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>