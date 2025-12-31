<?php

namespace App\Http\Controllers;

use App\Services\FakeDataStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        FakeDataStore::seed();
        return view('auth.login');
    }

    public function showRegister()
    {
        FakeDataStore::seed();
        return view('auth.register');
    }

    public function login(Request $request)
    {
        FakeDataStore::seed();

        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $users = session('users', []);
        $user = collect($users)->firstWhere('email', $data['email']);

        if (!$user || !Hash::check($data['password'], $user['password'])) {
            return back()->withErrors(['email' => 'Neteisingi prisijungimo duomenys.'])->withInput();
        }

        session(['auth_user' => $user]);

        return $this->redirectByRole($user['role']);
    }

    public function register(Request $request)
    {
        FakeDataStore::seed();

        $data = $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        $users = session('users', []);

        $exists = collect($users)->firstWhere('email', $data['email']);
        if ($exists) {
            return back()->withErrors(['email' => 'Toks el. paštas jau egzistuoja.'])->withInput();
        }

        $id = empty($users) ? 1 : (max(array_keys($users)) + 1);

        $newUser = [
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role' => 'client',
            'password' => Hash::make($data['password']),
        ];

        $users[$id] = $newUser;
        session(['users' => $users, 'auth_user' => $newUser]);

        return redirect()->route('client.conferences.index');
    }

    public function logout(Request $request)
    {
        session(['auth_user' => null]);
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // OPTIONAL: quick login (jei nori palikti demo mygtukus)
    public function loginAsAdmin()
    {
        FakeDataStore::seed();
        $users = session('users', []);
        $admin = collect($users)->firstWhere('role', 'admin');

        session(['auth_user' => $admin]);

        return redirect()->route('admin.index');
    }

    public function loginAsEmployee()
    {
        FakeDataStore::seed();
        $users = session('users', []);
        $emp = collect($users)->firstWhere('role', 'employee');

        session(['auth_user' => $emp]);

        return redirect()->route('employee.conferences.index');
    }

    private function redirectByRole(string $role)
    {
        return match ($role) {
            'admin' => redirect()->route('admin.index'),
            'employee' => redirect()->route('employee.conferences.index'),
            default => redirect()->route('client.conferences.index'),
        };
    }
}
