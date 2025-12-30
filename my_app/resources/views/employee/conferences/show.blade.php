@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="mb-0">{{ $conference['title'] }}</h1>

    <a class="btn btn-outline-primary" href="{{ route('employee.conferences.index') }}">
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
        <h5 class="mb-3">Užsiregistravę klientai</h5>

        @if(empty($clients))
            <p class="text-muted mb-0">Nėra registracijų.</p>
        @else
            <table class="table table-sm align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vardas</th>
                        <th>{{ __('app.user.email') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $i => $c)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $c['name'] }}</td>
                            <td>{{ $c['email'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection