<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white h-screen flex flex-col">

    <!-- Top Right Buttons -->
    @if (Route::has('login'))
        <div class="absolute top-4 right-4 flex space-x-2">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-4 py-2 bg-gray-200 text-black font-semibold rounded hover:bg-gray-300">
                   DASHBOARD
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-gray-200 text-black font-semibold rounded hover:bg-gray-300">
                   LOGIN
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-red-200 text-black font-semibold rounded hover:bg-red-300">
                       REGISTER
                    </a>
                @endif
            @endauth
        </div>
    @endif

    <!-- Centered Content -->
    <div class="flex flex-1 items-center justify-center text-center">
        <div>
            <h2 class="text-lg font-semibold">welcome to</h2>
            <h1 class="text-4xl font-extrabold">CHAT-APP</h1>
        </div>
    </div>

</body>
</html>
