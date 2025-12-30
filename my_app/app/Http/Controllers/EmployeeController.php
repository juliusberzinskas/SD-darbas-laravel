<?php

namespace App\Http\Controllers;

use App\Services\FakeDataStore;

class EmployeeController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();
        $conferences = session('conferences');

        return view('employee.conferences.index', compact('conferences'));
    }

    public function show(int $id)
    {
        FakeDataStore::seed();

        $conference = session('conferences')[$id] ?? abort(404);
        $registrations = session('registrations');
        $clients = $registrations[$id] ?? [];

        return view('employee.conferences.show', compact('conference', 'clients'));
    }
}
