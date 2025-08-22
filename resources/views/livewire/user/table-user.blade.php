<div>
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Cari Berdasarkan Nama atau Username"
            class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500"
        />
        <select wire:model="perPage" class="ml-4 px-3 py-2 border rounded">
            <option value="5">5 per page</option>
            <option value="10">10 per page</option>
            <option value="20">20 per page</option>
        </select>
        <livewire:user.export-user />
    </div>

    <div wire:loading class="text-blue-500 text-sm mb-2">Loading...</div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Username</th>
                    <th class="px-6 py-3">Created At</th>
                    <th class="px-6 py-3">Last Seen</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $users->firstItem() + $index }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white" wire:key="{{ $user->id }}">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->username }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4">
                        @if ($user->last_seen_at && $user->last_seen_at->diffInMinutes(now()) < 2)
                            <span class="text-green-600 font-semibold">Online</span>
                        @else
                            <span class="text-gray-500">
                                Offline (Last seen {{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'never' }})
                            </span>
                        @endif
                    <td class="px-6 py-4">
                        <button 
                            wire:click="$dispatch('user.log-user-activity', { userId: @js($user->id) })" 
                            class="bg-green-600 text-white px-4 py-2 rounded mr-2"
                            >
                            Log
                        </button>
                        <button 
                            wire:click="$dispatch('user.update-user', { userId: @js($user->id) })" 
                            class="bg-blue-600 text-white px-4 py-2 rounded mr-2"
                        >
                            Edit
                        </button>
                        <button 
                            wire:click="$dispatch('user.delete-user', { userId: {{ $user->id }} })"
                            wire:confirm="Yakin Hapus User ini ?"
                            class="bg-red-600 text-white px-4 py-2 rounded mr-2"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    
</div>