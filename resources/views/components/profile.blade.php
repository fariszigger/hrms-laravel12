@extends('components.layout.app')

@section('title', 'Profile')

@section('content')
<div x-data="{ editMode: false, changePass: false, avatarPreview: null }" class="p-4 sm:p-8 space-y-8">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Your Profile</h2>
            <p class="text-gray-600 dark:text-gray-400">Manage personal details, preferences, and credentials.</p>
        </div>
        <button @click="editMode = !editMode" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            <span x-text="editMode ? 'Cancel' : 'Edit Profile'"></span>
        </button>
    </div>

    <!-- Profile Overview -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Avatar Upload -->
        <div class="flex flex-col items-center">
            <div class="relative">
                <img :src="avatarPreview ?? 'https://i.pravatar.cc/120?img=5'" class="w-32 h-32 rounded-full border-4 border-blue-500 object-cover">
                <label class="absolute bottom-0 right-0 bg-blue-600 text-white p-1 rounded-full cursor-pointer hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15.232 5.232l3.536 3.536M16.732 3.732a2.5 2.5 0 113.536 3.536L7.5 20.5H4v-3.5L16.732 3.732z"/>
                    </svg>
                    <input type="file" class="hidden" @change="e => {
                        const file = e.target.files[0];
                        if (file) avatarPreview = URL.createObjectURL(file);
                    }">
                </label>
            </div>
            <p class="mt-3 text-lg font-medium text-gray-900 dark:text-white">John Doe</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">johndoe@example.com</p>
        </div>

        <!-- Personal Info -->
        <div class="lg:col-span-2 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Full Name</label>
                    <input type="text" value="John Doe" :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" value="johndoe@example.com" :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Phone</label>
                    <input type="text" value="+62 812-3456-7890" :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Gender</label>
                    <select :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Birthday</label>
                    <input type="date" value="1998-07-21" :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" value="Jakarta, Indonesia" :disabled="!editMode"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:ring-blue-500" />
                </div>
            </div>
        </div>
    </div>

    <!-- Account Preferences -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 space-y-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Account Settings</h3>
        <div class="flex items-center justify-between">
            <label class="text-gray-700 dark:text-gray-300">Enable Two-Factor Authentication</label>
            <input type="checkbox" class="toggle toggle-primary" :disabled="!editMode">
        </div>
        <div class="flex items-center justify-between">
            <label class="text-gray-700 dark:text-gray-300">Subscribe to Newsletter</label>
            <input type="checkbox" class="toggle toggle-success" checked :disabled="!editMode">
        </div>
    </div>

    <!-- Change Password -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 space-y-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change Password</h3>
            <button @click="changePass = !changePass" class="text-blue-600 hover:underline">
                <span x-text="changePass ? 'Hide' : 'Change Password'"></span>
            </button>
        </div>
        <div x-show="changePass" x-transition>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Current Password</label>
                    <input type="password" placeholder="••••••••"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">New Password</label>
                    <input type="password" placeholder="••••••••"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" />
                </div>
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input type="password" placeholder="••••••••"
                        class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2" />
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="text-right">
        <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition" :disabled="!editMode">
            Save All Changes
        </button>
    </div>
</div>
@endsection
