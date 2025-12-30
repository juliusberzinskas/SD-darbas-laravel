<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FakeDataStore;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();
        $users = session('users');

        return view('admin.users.index', compact('users'));
    }

    public function edit(int $id)
    {
        FakeDataStore::seed();
        $users = session('users');
        $user = $users[$id] ?? abort(404);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        FakeDataStore::seed();

        $data = $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email'],
        ]);

        $users = session('users');
        if (!isset($users[$id])) abort(404);

        $users[$id] = array_merge($users[$id], $data);
        session(['users' => $users]);

        return redirect()->route('admin.users.index');
    }
}