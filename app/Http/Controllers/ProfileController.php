<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $userDetails = Auth::user();
        $user = User::find($userDetails->id);

        $userAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $passwordAttributes = $request->validate([
            'password' => ['confirmed', Password::min(6)->letters(), 'nullable']
        ]);

        if ($passwordAttributes['password']) {
            $user->update([
                'name' => $userAttributes['name'],
                'email' => $userAttributes['email'],
                'password' => Hash::make($passwordAttributes['password']),
            ]);
        } else {
            $user->update([
                'name' => $userAttributes['name'],
                'email' => $userAttributes['email'],
            ]);
        }

        return redirect()->back();
    }
}
