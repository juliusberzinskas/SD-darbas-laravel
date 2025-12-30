@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="mb-0">{{ $conference['title'] }}</h1>

    <a class="btn btn-outline-primary" href="{{ route('client.conferences.index') }}">
        {{ __('app.conference.conferences') }}
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <p><strong>{{ __('app.conference.description') }}:</strong> {{ $conference['description'] }}</p>
        <p><strong>{{ __('app.conference.speakers') }}:</strong> {{ $conference['speakers'] }}</p>
        <p><strong>{{ __('app.conference.date') }}:</strong> {{ $conference['date'] }}</p>
        <p><strong>{{ __('app.conference.time') }}:</strong> {{ $conference['time'] }}</p>
        <p class="mb-0"><strong>{{ __('app.conference.address') }}:</strong> {{ $conference['address'] }}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">{{ __('app.conference.register') }}</h5>

        <form method="POST" action="{{ route('client.conferences.register', $conference['id']) }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Vardas Pavardė</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Pvz. Jonas Jonaitis">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('app.user.email') }}</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="pvz. jonas@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                {{ __('app.conference.register') }}
            </button>
        </form>
    </div>
</div>
@endsection