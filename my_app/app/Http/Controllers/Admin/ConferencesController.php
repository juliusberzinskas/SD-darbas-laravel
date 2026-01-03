<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRequest;
use App\Models\Conference;
use Carbon\Carbon;

class ConferencesController extends Controller
{
    public function index()
    {
        $conferences = Conference::orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('admin.conferences.index', compact('conferences'));
    }

    public function show(int $id)
    {
        $conference = Conference::findOrFail($id);

        return view('admin.conferences.show', compact('conference'));
    }

    public function create()
    {
        // Kad tavo view'ai (kurie tikriausiai naudoja $conference->...) veiktų vienodai,
        // perduodam tuščią modelį
        $conference = new Conference();

        return view('admin.conferences.create', compact('conference'));
    }

    public function store(ConferenceRequest $request)
    {
        Conference::create($request->validated());

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.conference.save') . ' OK');
    }

    public function edit(int $id)
    {
        $conference = Conference::findOrFail($id);

        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(ConferenceRequest $request, int $id)
    {
        $conference = Conference::findOrFail($id);
        $conference->update($request->validated());

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.conference.update') . ' OK');
    }

    public function destroy(int $id)
    {
        $conference = Conference::findOrFail($id);

        // SD1 taisyklė: įvykusių konferencijų trinti negalima
        $date = Carbon::parse($conference->date)->startOfDay();
        if ($date->isPast()) {
            return redirect()
                ->route('admin.conferences.index')
                ->with('error', __('app.conference.cannot_delete_past'));
        }

        $conference->delete();

        return redirect()
            ->route('admin.conferences.index')
            ->with('success', __('app.conference.delete') . ' OK');
    }
}