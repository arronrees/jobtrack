<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $validatedAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $rand = rand(0, 100000);

        $user = User::create([...$validatedAttributes, 'avatar_url' => "http://picsum.photos/seed/$rand/600"]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
