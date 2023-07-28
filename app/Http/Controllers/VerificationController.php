<?php

namespace App\Http\Controllers;

use App\Models\User;

class VerificationController extends Controller
{
    public function verify($id, $hash)
    {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            return redirect()->to('/');
        }

        if ($user->markEmailAsVerified()) {
            $user->save();
            event(new \Illuminate\Auth\Events\Verified($user));
        }

        return redirect()->to('/');
    }
}
