<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $users = \App\Models\User::all();
        return view('admin.users', compact('users'));
    }
    public function create() { return view('admin.user_create'); }
    public function store() {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'carnet' => 'required|string|unique:users,carnet',
            'phone' => 'required|string|max:30',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,cliente',
            'password' => 'required|string|min:6',
        ]);
        $data['password'] = bcrypt($data['password']);
        \App\Models\User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente.');
    }
    public function edit($id) {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.user_edit', compact('user'));
    }
    public function update($id) {
        $user = \App\Models\User::findOrFail($id);
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,cliente',
            'password' => 'nullable|string|min:6',
        ]);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    public function destroy($id) {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
