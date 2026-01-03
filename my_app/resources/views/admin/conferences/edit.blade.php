@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.conference.edit') }}: {{ $conference->title }}</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.conferences.update', $conference->id) }}">
            @csrf
            @method('PUT')

            @include('admin.conferences._form', [
                'conference' => $conference,
                'submitText' => __('app.conference.update')
            ])
        </form>
    </div>
</div>
@endsection