<!DOCTYPE html>
<html>
<head>
    <title>ProPay | People</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)">

    <x-navbar />

    <div class="bg-[#1a1a2e] border-t border-[#2d2d4e] px-8 py-3">
        <span class="text-gray-400 text-sm">Total People in System: </span>
        <span class="text-white font-bold text-sm">{{ $people->count() }}</span>
    </div>

    <div class="px-8 py-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-white text-2xl font-bold">People Management</h1>
                <p class="text-gray-400 text-sm mt-1">Manage all people you have registered</p>
            </div>
            <a href="{{ route('people.create') }}" class="bg-[#e63946] hover:bg-white hover:text-[#e63946] text-white px-5 py-2 rounded text-sm font-medium transition">
                + Add New Person
            </a>
        </div>

        <x-alert type="success" />
        <x-alert type="error" />

        <x-people-table :people="$people" />
    </div>

</body>
</html>