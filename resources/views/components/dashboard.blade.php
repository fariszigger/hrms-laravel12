@extends('components.layout.app')

@section('title', 'Dashboard')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('show-toast'))
    <script>
        const toast = @json(session('show-toast'));
        // Example using SweetAlert2
        Swal.fire({
            toast: true,
            icon: toast.type ?? 'info',
            title: toast.message ?? 'Notice',
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
@endif

<div class="p-4 sm:p-8" x-data="{ showActivities: true }">
    <!-- Dashboard Heading -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Welcome to the Dashboard</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Your activity overview and recent updates.</p>
        </div>
        <!-- Toggle Button -->
        <button @click="showActivities = !showActivities"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            <span x-text="showActivities ? 'Hide' : 'Show'"></span> Activities
        </button>
    </div>

    <!-- Search Bar (non-functional for now) -->
    <div class="mt-6">
        <input type="text" placeholder="Search activities..."
               class="w-full md:w-1/3 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Dashboard Cards/Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        <!-- Card -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Total Users</h3>
            <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">1,245</p>
            <p class="mt-1 text-gray-500 dark:text-gray-400">Registered in the system.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Active Sessions</h3>
            <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">27</p>
            <p class="mt-1 text-gray-500 dark:text-gray-400">Live user sessions now.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Total Revenue</h3>
            <p class="mt-2 text-3xl font-bold text-yellow-600 dark:text-yellow-400">$5,835.00</p>
            <p class="mt-1 text-gray-500 dark:text-gray-400">This month’s revenue.</p>
        </div>
    </div>

    <!-- Activity Overview Section -->
    <div class="mt-12" x-show="showActivities" x-transition>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Activities</h3>
        <div class="bg-white dark:bg-gray-800 rounded-lg mt-4 overflow-x-auto shadow-lg">
            <table class="w-full table-auto">
                <thead>
                    <tr class="border-b dark:border-gray-600">
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-white">Activity</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-white">Date</th>
                        <th class="px-4 py-2 text-left text-gray-700 dark:text-white">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">User Registered</td>
                        <td class="px-4 py-2">April 18, 2025</td>
                        <td class="px-4 py-2 text-green-500">Completed</td>
                    </tr>
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">Login Attempt Failed</td>
                        <td class="px-4 py-2">April 17, 2025</td>
                        <td class="px-4 py-2 text-red-500">Failed</td>
                    </tr>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">User Login</td>
                        <td class="px-4 py-2">April 17, 2025</td>
                        <td class="px-4 py-2 text-blue-500">Success</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection


