<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(['name', 'avatar_url', 'id', 'email', 'role']);

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = UserRole::cases();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(6)->letters(), 'confirmed'],
            'role' => ['required', Rule::enum(UserRole::class)],
        ]);

        $rand = rand(0, 100000);

        User::create([...$validatedAttributes, 'avatar_url' => "http://picsum.photos/seed/$rand/600"]);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $roles = UserRole::cases();

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $userAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::enum(UserRole::class)],
        ]);

        $passwordAttributes = $request->validate([
            'password' => ['confirmed', Password::min(6)->letters(), 'nullable']
        ]);

        if ($passwordAttributes['password']) {
            $user->update([
                'name' => $userAttributes['name'],
                'email' => $userAttributes['email'],
                'role' => $userAttributes['role'],
                'password' => Hash::make($passwordAttributes['password']),
            ]);
        } else {
            $user->update([
                'name' => $userAttributes['name'],
                'email' => $userAttributes['email'],
                'role' => $userAttributes['role'],
            ]);
        }

        return redirect('/users');
    }
}
