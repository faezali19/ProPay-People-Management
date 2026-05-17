<nav class="bg-[#1a1a2e] px-8 py-4 flex justify-between items-center shadow-lg">
    <span class="text-white font-bold text-xl">Pro<span class="text-[#e63946]">Pay</span> SA</span>
    <div class="flex items-center gap-4">
        <span class="text-gray-400 text-sm">Welcome, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-[#e63946] hover:bg-red-700 text-white text-sm px-4 py-2 rounded transition">Logout</button>
        </form>
    </div>
</nav>