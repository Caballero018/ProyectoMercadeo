<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request) {
        $user = User::create($request->all());
        
        auth()->login($user);
        Mail::to($user->email)->send(new VerificationMail($user));

        return redirect()->route('login.index');
    }
}
