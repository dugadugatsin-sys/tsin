<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    // 1. Display list of all users
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    // 2. Show create user form
    public function create()
    {
        return view('users.create');
    }

    // 3. Store new user in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,staff,customer'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // 4. Show edit user form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 5. Update user details and role
    public function update(Request $request, User $user)
    {
$request->validate([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
    'role' => ['required', 'in:admin,staff,customer'], // Must be lower-case
]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // 6. Delete user account
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}