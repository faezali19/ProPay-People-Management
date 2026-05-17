<!DOCTYPE html>
<html>
<head>
    <title>ProPay | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)">

    <div class="bg-white rounded-2xl shadow-2xl p-10 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#1a1a2e]">Pro<span class="text-[#e63946]">Pay</span> SA</h1>
            <p class="text-gray-500 text-sm mt-2">People Management System</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#1a1a2e]">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter your password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#1a1a2e]">
            </div>
            <button type="submit" class="w-full bg-[#1a1a2e] hover:bg-[#e63946] text-white py-3 rounded-lg text-sm font-semibold transition">
                Login
            </button>
        </form>
    </div>

</body>
</html>