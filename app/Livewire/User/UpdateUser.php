<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateUser extends Component
{
    public $showModal = false;

    public ?User $user = null;

    #[Validate]
    public $name = '';

    #[Validate]
    public $username = '';

    #[Validate]
    public $password = '';

    #[Validate]
    public $role_id = '';

    public $roles;

    public function mount()
    {
        $this->roles = \App\Models\Role::all();
    }

    #[On('user.update-user')]
    public function loadUser(int $userId)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $user = User::findOrFail($userId);

        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role_id = $user->role_id;
        $this->password = '';
        $this->showModal = true;
    }

    #[On('user.delete-user')]
    public function deleteUser(int $userId)
    {
        $user = User::findOrFail($userId);

        $user->delete();

        $this->dispatch('userUpdated');

        $this->dispatch('show-toast', type: 'danger', message: 'User deleted successfully!');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:8', 'max:255'],
            'username' => [
                'required',
                'min:8',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->user?->id),
            ],
            'password' => ['nullable', 'min:8'],
            'role_id' => ['required', Rule::in(['1', '2', '3'])],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $this->user->update($validated);

        $this->reset(['name', 'username', 'password', 'role_id', 'user', 'showModal']);

        $this->dispatch('userUpdated');

        $this->dispatch('show-toast', type: 'success', message: 'User updated successfully!');
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            @if($showModal)
                <div class="fixed inset-0 z-50 overflow-y-auto flex justify-center items-center bg-black bg-opacity-50">
                    <div class="relative p-4 w-full max-w-md">
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Update User - {{$user->name}}
                                </h3>
                                <button type="button" wire:click="$set('showModal', false)" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                            </div>

                            <form wire:submit.prevent="save" class="p-4 md:p-5">
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" wire:model.blur="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        @error('name') <div class="text-red-600 text-sm mt-1 block">{{ $message }}</div> @enderror
                                    </div> 
                                    <div class="col-span-2">
                                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                        <input type="text" wire:model.blur="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        @error('username') <div class="text-red-600 text-sm mt-1 block">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password (leave blank to keep current)</label>
                                        <input type="password" wire:model.blur="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        @error('password') <div class="text-red-600 text-sm mt-1 block">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                        <select wire:model.blur="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id') <div class="text-red-600 text-sm mt-1 block">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="button" wire:click="$set('showModal', false)" class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Cancel
                                    </button>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            @endif
        </div>
        HTML;
    }
}
