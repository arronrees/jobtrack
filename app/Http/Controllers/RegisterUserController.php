<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(6)->letters()]
        ]);

        $rand = rand(0, 100000);

        $user = User::create([...$validatedAttributes, 'avatar_url' => "http://picsum.photos/seed/$rand/600"]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
