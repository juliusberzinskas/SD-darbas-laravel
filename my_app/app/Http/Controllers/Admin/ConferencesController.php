<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
use App\Services\FakeDataStore;

class ConferencesController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();
        $conferences = session('conferences');

        return view('admin.conferences.index', compact('conferences'));
    }

    public function show(int $id)
    {
        FakeDataStore::seed();
        $conference = session('conferences')[$id] ?? abort(404);

        return view('admin.conferences.show', compact('conference'));
    }

    public function create()
    {
        FakeDataStore::seed();
        $conference = [
            'title' => '',
            'description' => '',
            'speakers' => '',
            'date' => '',
            'time' => '',
            'address' => '',
        ];

        return view('admin.conferences.create', compact('conference'));
    }

    public function store(ConferenceRequest $request)
    {
        FakeDataStore::seed();

        $conferences = session('conferences');
        $id = empty($conferences) ? 1 : (max(array_keys($conferences)) + 1);

        $conferences[$id] = array_merge(['id' => $id], $request->validated());
        session(['conferences' => $conferences]);

        return redirect()->route('admin.conferences.index');
    }

    public function edit(int $id)
    {
        FakeDataStore::seed();
        $conference = session('conferences')[$id] ?? abort(404);

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(ConferenceRequest $request, int $id)
    {
        FakeDataStore::seed();

        $conferences = session('conferences');
        if (!isset($conferences[$id])) abort(404);

        $conferences[$id] = array_merge($conferences[$id], $request->validated());
        session(['conferences' => $conferences]);

        return redirect()->route('admin.conferences.index');
    }

    public function destroy(int $id)
    {
        FakeDataStore::seed();

        $conferences = session('conferences');
        $conference = $conferences[$id] ?? abort(404);

        if (FakeDataStore::isPastConference($conference)) {
            return redirect()->route('admin.conferences.index')
                ->with('error', __('app.conference.cannot_delete_past'));
        }

        unset($conferences[$id]);
        session(['conferences' => $conferences]);

        return redirect()->route('admin.conferences.index');
    }
}
