<?php

namespace App\Http\Controllers;

use App\Services\FakeDataStore;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();
        $conferences = session('conferences');

        return view('client.conferences.index', compact('conferences'));
    }

    public function show(int $id)
    {
        FakeDataStore::seed();
        $conference = session('conferences')[$id] ?? abort(404);

        return view('client.conferences.show', compact('conference'));
    }

    public function register(Request $request, int $id)
    {
        FakeDataStore::seed();

        $conference = session('conferences')[$id] ?? abort(404);

        // minimal validation
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
        ]);

        $registrations = session('registrations');
        $registrations[$id] = $registrations[$id] ?? [];
        $registrations[$id][] = $data;

        session(['registrations' => $registrations]);

        return redirect()->route('client.conferences.show', $id);
    }
}
