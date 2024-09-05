<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('Users.create'); // Create user form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $validated['is_admin'],
        ]);

        return redirect()->route('Users.index')->with('success', 'User created successfully.');
    }

    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('Users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('Users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('Users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            'is_admin' => $validated['is_admin'],
        ]);

        return redirect()->route('Users.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('Users.index')->with('success', 'User deleted successfully.');
    }


}
