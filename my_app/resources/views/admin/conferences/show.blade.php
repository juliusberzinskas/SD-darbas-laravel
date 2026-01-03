@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h1 class="mb-0">{{ $conference->title }}</h1>

    <div class="d-flex gap-2">
        <a class="btn btn-outline-secondary" href="{{ route('admin.conferences.edit', $conference->id) }}">
            {{ __('app.conference.edit') }}
        </a>

        <form id="delete-form-{{ $conference->id }}"
              action="{{ route('admin.conferences.destroy', $conference->id) }}"
              method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="button"
                    class="btn btn-outline-danger"
                    onclick="confirmDelete('delete-form-{{ $conference->id }}')">
                {{ __('app.conference.delete') }}
            </button>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>{{ __('app.conference.description') }}:</strong> {{ $conference->description }}</p>
        <p><strong>{{ __('app.conference.speakers') }}:</strong> {{ $conference->speakers }}</p>
        <p><strong>{{ __('app.conference.date') }}:</strong> {{ $conference->date }}</p>
        <p><strong>{{ __('app.conference.time') }}:</strong> {{ $conference->time }}</p>
        <p class="mb-0"><strong>{{ __('app.conference.address') }}:</strong> {{ $conference->address }}</p>
    </div>
</div>

<a class="btn btn-outline-primary" href="{{ route('admin.conferences.index') }}">
    {{ __('app.conference.conferences') }}
</a>
@endsection
