<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string $roles)
    {
        $auth = session('auth_user');

        if (!$auth) {
            return redirect()->route('login')
                ->with('error', 'Prašome prisijungti.');
        }

        $allowed = explode('|', $roles); // pvz. "admin|employee"
        $userRole = $auth['role'] ?? null;

        if (!in_array($userRole, $allowed, true)) {
            // Jei neturi teisių – gražiai nukreipiam į jo posistemį
            return $this->redirectByRole($userRole)
                ->with('error', 'Neturite teisių pasiekti šį puslapį.');
        }

        return $next($request);
    }

    private function redirectByRole(?string $role)
    {
        return match ($role) {
            'admin' => redirect()->route('admin.index'),
            'employee' => redirect()->route('employee.conferences.index'),
            'client' => redirect()->route('client.conferences.index'),
            default => redirect()->route('login'),
        };
    }
}