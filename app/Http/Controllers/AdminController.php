<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function usersShow()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }
    public function userEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
}
