<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-blue-900 min-h-screen">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="{{ route('login') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <h1 class="text-xl text-center font-bold text-gray-100">
                Aplikasi HRMS Laravel 12
            </h1>
        </a>
        @yield('content')  <!-- This is where the child view content will go -->
        <br>
        <h5 class="text-sm text-center font-light text-white opacity-50">
            developed by 
            <a href="http://github.com/fariszigger" class="italic">@fariszigger</a>
        </h5>
    </div>
    @stack('scripts') 
</body>

</html>
