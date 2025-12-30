@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.conference.conferences') }} ({{ __('app.nav.employee') }})</h1>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('app.conference.title') }}</th>
            <th>{{ __('app.conference.date') }}</th>
            <th>{{ __('app.conference.time') }}</th>
            <th>{{ __('app.conference.address') }}</th>
            <th class="text-end">{{ __('app.conference.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($conferences as $conf)
            <tr>
                <td>{{ $conf['id'] }}</td>
                <td>{{ $conf['title'] }}</td>
                <td>{{ $conf['date'] }}</td>
                <td>{{ $conf['time'] }}</td>
                <td>{{ $conf['address'] }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{ route('employee.conferences.show', $conf['id']) }}">
                        {{ __('app.conference.view') }}
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-muted">0</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection