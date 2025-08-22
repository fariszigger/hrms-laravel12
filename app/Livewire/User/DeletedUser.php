<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class DeletedUser extends Component
{
    public $showDeletedUserModal = false;
    public $deletedUsers;

    #[On('user.deleted-modal')]
    public function loadDeletedUser()
    {
        $this->deletedUsers = User::onlyTrashed()->get(); // get soft deleted users
        $this->showDeletedUserModal = true;
    }

    public function restoreUser(int $userId)
    {
        $user = User::onlyTrashed()->find($userId);

        if ($user) {
            $user->restore();

            $this->deletedUsers = User::onlyTrashed()->get();

            $this->dispatch('userUpdated');

            $this->dispatch('show-toast', type: 'success', message: "{$user->name} berhasil di kembalikan!");

            $this->showDeletedUserModal = false;
        }
    }

    public function forceDeleteUser(int $userId)
    {
        $user = User::onlyTrashed()->find($userId);

        if ($user) {
            $user->forceDelete();

            $this->deletedUsers = User::onlyTrashed()->get();

            $this->dispatch('userUpdated');

            $this->dispatch('show-toast', type: 'danger', message: "{$user->name} berhasil di dihapus!");

            $this->showDeletedUserModal = false;
        }
    }

    public function render()
    {
        return view('livewire.user.deleted-user');
    }
}
