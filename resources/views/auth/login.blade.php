<!DOCTYPE html>
<html>
<head>
    <title>ProPay | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }
        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .brand-header h2 {
            color: #1a1a2e;
            font-weight: 700;
            font-size: 28px;
        }
        .brand-header span {
            color: #e63946;
        }
        .brand-header p {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        .btn-login {
            background-color: #1a1a2e;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
        }
        .btn-login:hover {
            background-color: #e63946;
            color: white;
        }
        .form-control:focus {
            border-color: #1a1a2e;
            box-shadow: 0 0 0 0.2rem rgba(26,26,46,0.15);
        }
        label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand-header">
            <h2>Pro<span>Pay</span> SA</h2>
            <p>People Management System</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-login mt-2">Login</button>
        </form>
    </div>
</body>
</html>