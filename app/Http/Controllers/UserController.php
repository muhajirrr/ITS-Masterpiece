<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();

        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request) {
        $user = User::create($request->only('username', 'name', 'password'));

        $role = $request->role;
        $mrole = Role::findOrFail($role);
        $user->assignRole($mrole);

        $request->session()->flash('success', 'User '. $user->name .' berhasil ditambahkan.');

        return redirect(route('user.index'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $user->fill($request->only('username', 'name', 'password'))->save();
        $role = $request->role;
        $user->syncRoles($role);

        $request->session()->flash('success', 'User '. $user->name .' berhasil diubah.');

        return redirect(route('user.index'));
    }

    public function destroy(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->delete();

        $request->session()->flash('success', 'User '. $user->name .' berhasil dihapus.');

        return redirect(route('user.index'));
    }
}
