<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
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
    public function edit(AdminRequest $request, User $user)
    {
        $data = array_filter($request->all(), function ($value) {
            return $value !== null;
        });
        $user->update($data);

        return redirect()->route('admin.users');
    }
}
