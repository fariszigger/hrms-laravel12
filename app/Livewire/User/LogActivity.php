<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\UserActivityLog;
use Livewire\Component;
use Livewire\Attributes\On;

class LogActivity extends Component
{
    public $showModal = false;
    public $user;
    public $logs = [];

    #[On('user.log-user-activity')]
    public function loadActivity(int $userId): void
    {
        $this->user = User::findOrFail($userId);
        $this->logs = UserActivityLog::where('user_id', $userId)
            ->latest('accessed_at')
            ->take(100)
            ->get();

        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->reset(['showModal', 'user', 'logs']);
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            @if ($showModal)
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-3xl p-6">
                        <div class="flex justify-between items-center border-b pb-3 mb-4">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                                Activity Log for {{ $user->name }}
                            </h2>
                            <button wire:click="closeModal" class="text-gray-400 hover:text-red-600 text-xl font-bold">
                                &times;
                            </button>
                        </div>

                        @if (count($logs))
                            <div class="overflow-y-auto max-h-96">
                                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                                    <thead class="text-xs text-gray-600 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
                                        <tr>
                                            <th class="px-4 py-2">URL</th>
                                            <th class="px-4 py-2">Method</th>
                                            <th class="px-4 py-2">IP</th>
                                            <th class="px-4 py-2">UserAgent</th>
                                            <th class="px-4 py-2">Accessed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr class="border-b dark:border-gray-600">
                                                <td class="px-4 py-2 break-all">{{ $log->url }}</td>
                                                <td class="px-4 py-2">{{ $log->method }}</td>
                                                <td class="px-4 py-2">{{ $log->ip_address }}</td>
                                                <td class="px-4 py-2 text-xs break-all">{{ $log->user_agent }}</td>
                                                <td class="px-4 py-2">{{ $log->accessed_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-600 dark:text-gray-400 text-sm">No activity found.</p>
                        @endif

                        <div class="mt-4 text-right">
                            <button wire:click="closeModal" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        HTML;
    }
}
