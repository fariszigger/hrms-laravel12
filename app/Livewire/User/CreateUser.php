<?php

namespace App\Livewire\User;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class CreateUser extends Component
{
    public $showModal = false;

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
        $this->roles = Role::all();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:8|max:255',
            'username' => 'required|min:8|max:255|unique:users,username',
            'password' => 'required|min:8',
            'role_id' => 'required|in:1,2,3',
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        User::create($validated);

        session()->flash('status', 'User Berhasil di Simpan!');

        $this->reset(['name', 'username', 'password', 'role_id']);

        $this->showModal = false;

        $this->dispatch('userUpdated');

        $this->dispatch('show-toast', type: 'success', message: 'User added successfully!');
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            
            <button wire:click="setShowModalTrue"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                Tambah User
            </button>

            @if($showModal)
            <div class="fixed inset-0 z-50 overflow-y-auto flex justify-center items-center bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-md">
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah User
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
                                    <input type="text" wire:model.blur="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" placeholder="Type full name" required>
                                    @error('name') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" wire:model.blur="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" placeholder="Enter username" required>
                                    @error('username') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" wire:model.blur="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" placeholder="Enter password" required>
                                    @error('password') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-2">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <select wire:model.blur="role_id" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        <option selected value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        HTML;
    }


    public function setShowModalTrue()
    {
        $this->showModal = true;
    }
}
