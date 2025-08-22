<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Curtain Overlay -->
    <div id="curtain" class="fixed inset-0 bg-black opacity-0 z-50 transition-opacity duration-1000 pointer-events-none"></div>

    <!-- Main Layout Wrapper: Flexbox to hold the sidebar and content -->
    <div class="flex min-h-screen">

        <!-- Include Sidebar on the left -->
        @include('components.layout.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 sm:ml-64"> <!-- Adjust for sidebar width, 64 is usually 16rem -->
            <!-- Include Navbar -->
            @include('components.layout.navbar')

            <!-- Main Content -->
            <div class="container mx-auto p-6">
                @yield('content')
            </div>

            <!-- Include Footer -->
            <div class="container mx-auto px-4 py-2">
                @include('components.layout.footer')
            </div>
        </div>

    </div>

    @stack('js')

    <script>
    window.addEventListener('show-toast', event => {
        const { type, message } = event.detail;

        document.querySelectorAll('[id^="toast-"]').forEach(el => el.classList.add('hidden'));

        const toastMap = {
            success: '#toast-success',
            danger: '#toast-danger',
            warning: '#toast-warning'
        };

        const toastId = toastMap[type];
        const toastEl = document.querySelector(toastId);
        if (toastEl) {
            toastEl.querySelector('.text-sm.font-normal').textContent = message;
            toastEl.classList.remove('hidden');

            // Auto-hide after 3 seconds
            setTimeout(() => {
                toastEl.classList.add('hidden');
            }, 3000);
        }
    });
</script>
</body>
</html>
