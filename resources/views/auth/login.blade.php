<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8">
        <div class="w-fit mx-auto">
            <img src="{{asset('images/logo.png')}}" alt="" class="w-32 h-32 rounded-full">
        </div>
        <h2 class="text-2xl font-bold text-center text-green-700 mt-6 uppercase">Agri-Market Management System</h2>
        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">Login</h2>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('authenticate') }}" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">username</label>
                <input id="username" name="username" type="text" required autofocus
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 cursor-pointer">
                Login
            </button>

            <div class="text-center mt-4">
                <a href="#" class="text-sm text-green-600 hover:underline">Forgot your password?</a>
            </div>
        </form>
    </div>

</body>
</html>
