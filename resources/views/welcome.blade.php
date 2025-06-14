<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-gray-900 to-gray-800">
        <div class="w-full max-w-md px-6 py-12 bg-white dark:bg-gray-900 shadow-2xl rounded-2xl border border-gray-700 text-center">
            @if (Route::has('login'))
                <h1 class="text-3xl font-bold mb-8 text-white">Bem-vindo!</h1>
                <div class="flex flex-col space-y-4">
                    @auth
                        <a
                            href="{{ url('/admin/index') }}"
                            class="w-full bg-[#FF2D20] hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md"
                        >
                            Dashboard
                        </a>
                        <a
                            href="{{ route('tickets.create') }}"
                            class="w-full bg-[#1F2937] hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md"
                        >
                            Criar Ticket
                        </a>
                        <a 
                            href="{{ route('login') }}"
                            class="w-full bg-[#1F2937] hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md"
                        >
                            Logout
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="w-full bg-[#FF2D20] hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="w-full bg-gray-700 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
