<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
    * Function that displays the user login
    */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Function handles user authentication. If the user's credentials match
     * those stored in the database, the user is authenticated and redirected
     * to different locations based on their role (admin or normal user).
     *
     * @param Illuminate\Http\Request $request
    */
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(!auth()->attempt(array(
                $fieldType => $credentials['email'],
                'password' => $credentials['password']))) {
            return back()->withErrors([
                'message' => 'The email/username or password is incorrect, please try again',
            ]);
        } else {
            if (auth()->user()->role == 'admin') {
                if ($request->is('/')) {
                }
                return redirect()->route('admin.index');
            }
            return redirect()->to('/');
        }
    }

    /**
     * Function that is responsible for closing the user session
     *
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
