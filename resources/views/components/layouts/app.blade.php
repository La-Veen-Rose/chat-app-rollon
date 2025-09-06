
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body class="h-screen flex">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-300 text-black flex flex-col">
        <div class="p-4 font-bold text-sm">
            CHAT- APP- ROLLON
        </div>
        <nav class="flex flex-col gap-2 px-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 bg-white px-3 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 bg-white px-3 py-2 rounded hover:bg-gray-100">
                Profile Settings
            </a>
            <a href="{{ route('chat.page') }}" class="flex items-center gap-2 bg-white px-3 py-2 rounded hover:bg-gray-100">
                Chats
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        @yield('content')
    </div>

    @livewireScripts
   <!-- <script defer src="//unpkg.com/alpinejs"></script> -->
</body>
</html>
