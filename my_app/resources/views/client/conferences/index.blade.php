@extends('layouts.app')

@section('content')
<div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-4">
    <div>
        <h1 class="h3 mb-1">{{ __('app.conference.conferences') }}</h1>
        <div class="text-muted">{{ __('app.client.subtitle') }}</div>
    </div>

    <div class="d-flex gap-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>{{ __('app.conference.title') }}</th>
                        <th>{{ __('app.conference.date') }}</th>
                        <th>{{ __('app.conference.time') }}</th>
                        <th>{{ __('app.conference.address') }}</th>
                        <th class="text-end pe-3">{{ __('app.conference.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($conferences as $conf)
                        <tr>
                            <td class="ps-3">{{ $conf['id'] }}</td>
                            <td class="fw-semibold">{{ $conf['title'] }}</td>
                            <td><span class="badge bg-light text-dark">{{ $conf['date'] }}</span></td>
                            <td><span class="badge bg-light text-dark">{{ $conf['time'] }}</span></td>
                            <td class="text-muted">{{ $conf['address'] }}</td>
                            <td class="text-end pe-3">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('client.conferences.show', $conf['id']) }}">
                                    {{ __('app.conference.view') }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                {{ __('app.client.no_conferences') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
