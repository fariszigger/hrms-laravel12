<div>
    <button 
        wire:click="$dispatch('user.deleted-modal')" 
        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 focus:ring-2 focus:ring-red-400"
    >
        Deleted Users
    </button>

    @if ($showDeletedUserModal)
        <div class="fixed inset-0 z-50 overflow-y-auto flex justify-center items-center bg-black bg-opacity-50">
            <div class="relative w-full max-w-4xl p-6 mx-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <!-- Modal Header -->
                <div class="flex items-center justify-between border-b border-gray-300 dark:border-gray-600 pb-4 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Daftar Deleted User
                    </h3>
                    <button 
                        type="button" 
                        wire:click="$set('showDeletedUserModal', false)" 
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1 dark:hover:bg-gray-700 dark:hover:text-white"
                        aria-label="Close modal"
                    >
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 1l12 12M13 1L1 13" />
                        </svg>
                    </button>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead class="bg-gradient-to-r from-red-500 to-red-700 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Username</th>
                                <th scope="col" class="px-6 py-3">Deleted at</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($deletedUsers as $user)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-red-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->username }}</td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-gray-400">{{ $user->deleted_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button 
                                            class="text-green-600 hover:text-green-800 dark:hover:text-green-400 font-semibold mr-4"
                                            wire:click="restoreUser({{ $user->id }})"
                                            wire:confirm="Yakin Kembalikan User ini ?"
                                            type="button"
                                        >
                                            Restore
                                        </button>
                                        <button 
                                            class="text-red-600 hover:text-red-800 dark:hover:text-red-400 font-semibold"
                                            wire:click="forceDeleteUser({{ $user->id }})"
                                            wire:confirm="This Action Can't be Undone, Are You Sure ?"
                                            type="button"
                                        >
                                            Delete Forever!
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-gray-50 dark:bg-gray-900">
                                    <td colspan="4" class="px-6 py-6 text-center text-gray-400 dark:text-gray-500 font-medium">
                                        Data Tidak Ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
