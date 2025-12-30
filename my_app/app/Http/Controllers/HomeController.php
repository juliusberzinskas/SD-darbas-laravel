<?php

namespace App\Http\Controllers;

use App\Services\FakeDataStore;

class HomeController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();

        return view('home', [
            'user' => session('current_user'),
            'student' => [
                'first_name' => 'TAVO_VARDAS',
                'last_name' => 'TAVO_PAVARDĖ',
                'group' => 'TAVO_GRUPĖ',
            ],
        ]);
    }
}