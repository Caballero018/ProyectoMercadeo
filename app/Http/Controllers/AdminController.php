<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Function that shows the main view of the Admin
    */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Function that shows view of all users
     */
    public function usersShow()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }

    /**
     * Function that shows view of all users
     * 
     * @param App\Models\User $user
     */
    public function userEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    /**
     * Function edited by a specific user
     * 
     * @param App\Http\Requests\AdminRequest $request
     * @param App\Models\User $user
     */
    public function edit(AdminRequest $request, User $user)
    {
        $data = array_filter($request->all(), function ($value) {
            return $value !== null;
        });
        $user->update($data);

        return redirect()->route('admin.users');
    }
}
