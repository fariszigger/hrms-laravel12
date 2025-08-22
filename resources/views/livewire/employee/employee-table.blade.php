<div>
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0">
        <div class="relative w-full sm:w-1/3">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Cari Berdasarkan Nama atau Alamat"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500 pr-10" {{-- Add padding-right to avoid overlap --}}
            />

            <div
                wire:loading
                wire:target="search"
                class="absolute right-3 top-1/2 transform -translate-y-1/2"
            >
                <svg
                    class="w-5 h-5 text-blue-500 animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                    ></path>
                </svg>
            </div>
        </div>

        <select wire:model.live="perPage" class="ml-0 sm:ml-4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
            <option value="5">5 per page</option>
            <option value="10">10 per page</option>
            <option value="20">20 per page</option>
        </select>

        <livewire:user.export-user />
    </div>

    {{-- Employee Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="sr-only">Employee Data Table</caption>

            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Date of Birth</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($employees as $index => $employee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ ($employees->firstItem() ?? 0) + $index }}
                        </td>

                        <td class="px-6 py-4">
                            {{-- Optional avatar or photo --}}
                            {{-- <img src="{{ asset($employee->photo_path ?? 'default.png') }}" class="w-8 h-8 rounded-full"> --}}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white" wire:key="{{ $employee->id }}">
                            {{ $employee->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $employee->address }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $employee->pob }},
                            {{ optional($employee->dob)->format('Y-m-d') ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            <button wire:click="$emit('editEmployee', {{ $employee->id }})" class="text-blue-600 hover:underline">Edit</button>
                            <button wire:click="$emit('deleteEmployee', {{ $employee->id }})" class="text-red-600 hover:underline ml-2">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No employee found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="mt-4 px-4 relative">
        <!-- Static loading overlay (no animation) -->
        <div
            wire:loading
            wire:target="perPage, gotoPage, nextPage, previousPage"
            class="absolute inset-0 bg-white/60 dark:bg-gray-900/60 flex items-center justify-center z-10 rounded-md"
        >
            <span class="text-gray-700 dark:text-gray-200 text-sm font-medium">
                Loading page...
            </span>
        </div>

        {{-- Show pagination only when not loading --}}
        <div wire:loading.remove>
            {{ $employees->links() }}
        </div>
    </div>

    
</div>
