<!DOCTYPE html>
<html>
<head>
    <title>ProPay | Add Person</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); font-family: 'Segoe UI', sans-serif; min-height: 100vh; margin: 0; }
        .navbar { background-color: #1a1a2e; padding: 12px 30px; }
        .navbar-brand { color: white !important; font-weight: 700; font-size: 22px; }
        .navbar-brand span { color: #e63946; }
        .nav-user { color: #ccc; font-size: 14px; margin-right: 15px; }
        .btn-logout { background-color: #e63946; color: white; border: none; padding: 6px 16px; border-radius: 5px; font-size: 14px; }
        .main-container { padding: 30px; max-width: 800px; margin: 0 auto; }
        .page-title { font-size: 24px; font-weight: 700; color: white; margin-bottom: 5px; }
        .form-card { background: rgba(255,255,255,0.95); border-radius: 10px; box-shadow: 0 8px 32px rgba(0,0,0,0.3); padding: 30px; margin-top: 20px; }
        label { font-weight: 600; font-size: 14px; color: #333; }
        .form-control:focus { border-color: #1a1a2e; box-shadow: 0 0 0 0.2rem rgba(26,26,46,0.15); }
        .btn-save { background-color: #1a1a2e; color: white; border: none; padding: 10px 30px; border-radius: 6px; font-size: 15px; }
        .btn-save:hover { background-color: #e63946; color: white; }
        .btn-back { background-color: transparent; color: #1a1a2e; border: 2px solid #1a1a2e; padding: 10px 30px; border-radius: 6px; font-size: 15px; text-decoration: none; }
        .btn-back:hover { background-color: #1a1a2e; color: white; }
        .interest-label { display: inline-flex; align-items: center; margin-right: 15px; margin-top: 8px; font-weight: normal; cursor: pointer; }
        .interest-label input { margin-right: 6px; }
    </style>
</head>
<body>
    <nav class="navbar d-flex justify-content-between align-items-center">
        <span class="navbar-brand">Pro<span>Pay</span> SA</span>
        <div class="d-flex align-items-center">
            <span class="nav-user">Welcome, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="main-container">
        <p class="page-title">Add New Person</p>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('people.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="First name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control" value="{{ old('surname') }}" placeholder="Last name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>SA ID Number</label>
                        <input type="text" name="sa_id_number" class="form-control" value="{{ old('sa_id_number') }}" placeholder="13 digit ID number">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control" value="{{ old('mobile_number') }}" placeholder="10 digit mobile number">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email_address" class="form-control" value="{{ old('email_address') }}" placeholder="Email address">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Birth Date</label>
                        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Language</label>
                    <select name="language_id" class="form-control">
                        <option value="">Select Language</option>
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label>Interests</label><br>
                    @foreach($interests as $interest)
                        <label class="interest-label">
                            <input type="checkbox" name="interests[]" value="{{ $interest->id }}"
                                {{ in_array($interest->id, old('interests', [])) ? 'checked' : '' }}>
                            {{ $interest->name }}
                        </label>
                    @endforeach
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn-save">Save Person</button>
                    <a href="{{ route('people.index') }}" class="btn-back">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>