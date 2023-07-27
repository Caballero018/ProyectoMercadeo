<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request) {
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
                return redirect()->route('admin.index');
            }
            return redirect()->to('/');
        }
    }
    public function destroy() {
        auth()->logout();
        return redirect()->to('/');
    }
}
