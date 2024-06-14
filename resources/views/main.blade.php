<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keuangan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">
    {{-- Navbar --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Keuangan</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                @if (Auth::check())
                    <a class="text-sm  text-gray-500 dark:text-white font-bold">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" class="text-sm  text-pink-500 hover:underline">Logout</a>
                @endif
                @if (!Auth::check())
                    <a href="{{ route('daftar') }}"
                        class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Daftar</a>
                    <a href="{{ route('login') }}"
                        class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                @endif
            </div>
        </div>
    </nav>
    <nav class="bg-emerald-400">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-900 dark:text-white hover:underline"
                            aria-current="page">HOME</a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('keuangan') }}"
                                class="text-gray-900 dark:text-white hover:underline">KELOLA KEUANGAN</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}
    @yield('content')

    <footer
        class="w-full h-16 bg-emerald-400 flex justify-center items-center font-semibold mt-12 text-xs md:text-base">
        <p>&copy; 2024 Mhhidayat. All Rights Reserved.</p>
    </footer>
    @yield('js')
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>
