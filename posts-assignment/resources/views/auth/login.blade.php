<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold mb-4">Login</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}" class="max-w-md space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input 
                type="email" 
                name="email" 
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <div>
            <label class="block mb-1 font-medium">Password</label>
            <input 
                type="password" 
                name="password" 
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Login
        </button>
    </form>

    <p class="mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>

</body>
</html>
