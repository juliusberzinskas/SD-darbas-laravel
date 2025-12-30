@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.admin.title') }}</h1>

<div class="d-flex gap-2 flex-wrap">
    <a class="btn btn-outline-primary" href="{{ route('admin.users.index') }}">
        {{ __('app.admin.manage_users') }}
    </a>
    <a class="btn btn-outline-primary" href="{{ route('admin.conferences.index') }}">
        {{ __('app.admin.manage_conferences') }}
    </a>
</div>
@endsection
