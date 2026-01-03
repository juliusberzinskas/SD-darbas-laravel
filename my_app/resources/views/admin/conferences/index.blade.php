@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="mb-0">{{ __('app.conference.conferences') }}</h1>

    <a class="btn btn-primary" href="{{ route('admin.conferences.create') }}">
        {{ __('app.conference.create') }}
    </a>
</div>

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
                <td>{{ $conf->id }}</td>
                <td>{{ $conf->title }}</td>
                <td>{{ $conf->date }}</td>
                <td>{{ $conf->time }}</td>
                <td>{{ $conf->address }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-outline-primary"
                       href="{{ route('admin.conferences.show', $conf->id) }}">
                        {{ __('app.conference.view') }}
                    </a>

                    <a class="btn btn-sm btn-outline-secondary"
                       href="{{ route('admin.conferences.edit', $conf->id) }}">
                        {{ __('app.conference.edit') }}
                    </a>

                    <form id="delete-form-{{ $conf->id }}"
                          action="{{ route('admin.conferences.destroy', $conf->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                                class="btn btn-sm btn-outline-danger"
                                onclick="confirmDelete('delete-form-{{ $conf->id }}')">
                            {{ __('app.conference.delete') }}
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-muted">
                    {{ __('app.conference.conferences') }}: 0
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection