<?php

namespace App\Services;

use Carbon\Carbon;

class FakeDataStore
{
    public static function seed(): void
    {
        if (!session()->has('conferences')) {
            session([
                'conferences' => [
                    1 => [
                        'id' => 1,
                        'title' => 'Laravel Basics',
                        'description' => 'Intro to Laravel routing and views.',
                        'speakers' => 'John Doe',
                        'date' => now()->addDays(10)->toDateString(),
                        'time' => '10:00',
                        'address' => 'Vilnius, LT',
                    ],
                    2 => [
                        'id' => 2,
                        'title' => 'Web Security',
                        'description' => 'OWASP basics for web developers.',
                        'speakers' => 'Jane Smith',
                        'date' => now()->subDays(3)->toDateString(),
                        'time' => '14:00',
                        'address' => 'Kaunas, LT',
                    ],
                ],
            ]);
        }

        if (!session()->has('users')) {
            session([
                'users' => [
                    1 => ['id' => 1, 'first_name' => 'Admin', 'last_name' => 'User', 'email' => 'admin@example.com'],
                    2 => ['id' => 2, 'first_name' => 'Employee', 'last_name' => 'User', 'email' => 'employee@example.com'],
                    3 => ['id' => 3, 'first_name' => 'Client', 'last_name' => 'User', 'email' => 'client@example.com'],
                ],
            ]);
        }

        if (!session()->has('current_user')) {
            session([
                'current_user' => ['first_name' => 'Demo', 'last_name' => 'User'],
            ]);
        }

        if (!session()->has('registrations')) {
            // registrations[conference_id] = [ ['name'=>..., 'email'=>...], ... ]
            session(['registrations' => []]);
        }
    }

    public static function isPastConference(array $conf): bool
    {
        $dt = Carbon::parse($conf['date'] . ' ' . $conf['time']);
        return $dt->isPast();
    }
}
