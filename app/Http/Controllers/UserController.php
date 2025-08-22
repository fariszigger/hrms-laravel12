<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('components.users', compact('users'));
    }

    public function roles()
    {
        $roles = Role::latest()->get();
        return view('components.roles', compact('roles'));
    }
}
