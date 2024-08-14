<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(['name', 'avatar_url', 'id', 'email', 'role']);

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $user->load(['jobs' => function ($query) {
            $query->with('client');
        }]);

        return view('users.show', ['user' => $user]);
    }


    public function create()
    {
        $roles = UserRole::cases();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'Admin') {
            // admin cant create user with a higher level
            if ($request->role === 'Superadmin') {
                return redirect()->back()->withErrors(['role' => 'You do not have permssion to assign a Superadmin']);
            }
        }

        $validatedAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(6)->letters(), 'confirmed'],
            'role' => ['required', Rule::enum(UserRole::class)],
            'avatar' => ['nullable', File::types(['png', 'jpg', 'webp'])->max(5 * 1024)]
        ]);

        $avatar_url = '';

        if ($request->avatar && $validatedAttributes['avatar']) {
            $avatar_url = $request->avatar->store('avatars');
        }

        User::create([...$validatedAttributes, 'avatar_url' => $avatar_url]);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $roles = UserRole::cases();

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role === 'Admin') {
            if ($request->role === 'Superadmin') {
                return redirect()->back()->withErrors(['role' => 'You do not have permssion to assign a Superadmin']);
            }
        }

        $userAttributes = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::enum(UserRole::class)],
            'avatar' => ['nullable', File::types(['png', 'jpg', 'webp'])->max(5 * 1024)]
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

        if ($request->avatar && $userAttributes['avatar']) {
            $avatar_url = $request->avatar->store('avatars');

            $user->update([
                'avatar_url' => $avatar_url,
            ]);
        }

        return redirect("/users/$user->id");
    }
}
