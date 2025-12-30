@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.conference.create') }}</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.conferences.store') }}">
            @csrf

            @include('admin.conferences._form', [
                'conference' => $conference,
                'submitText' => __('app.conference.save')
            ])
        </form>
    </div>
</div>
@endsection
