<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Klientas mato tik planuojamas konferencijas
        $conferences = Conference::whereDate('date', '>=', now()->toDateString())
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('client.conferences.index', compact('conferences'));
    }

    public function show(int $id)
    {
        $conference = Conference::findOrFail($id);

        // ar prisijungęs vartotojas jau užsiregistravęs?
        $user = session('auth_user'); // kol kas naudojam tavo esamą session auth
        $alreadyRegistered = false;

        if ($user && isset($user['id'])) {
            $alreadyRegistered = $conference->users()
                ->where('users.id', $user['id'])
                ->exists();
        }

        return view('client.conferences.show', compact('conference', 'alreadyRegistered'));
    }

    public function register(Request $request, int $id)
    {
        $conference = Conference::findOrFail($id);

        $user = session('auth_user');
        if (!$user || !isset($user['id'])) {
            return redirect()->route('login')->with('error', 'Prisijunkite prieš registruojantis.');
        }

        // Pridėti į pivot (users_conferences), bet ne dubliuoti
        $conference->users()->syncWithoutDetaching([$user['id']]);

        return redirect()
            ->route('client.conferences.show', $conference->id)
            ->with('success', __('app.conference.register') . ' OK');
    }
}