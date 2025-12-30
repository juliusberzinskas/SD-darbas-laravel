@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.home.title') }}</h1>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ __('app.home.student') }}</h5>
        <ul class="mb-0">
            <li>{{ __('app.home.name') }}: {{ $student['first_name'] }}</li>
            <li>{{ __('app.home.surname') }}: {{ $student['last_name'] }}</li>
            <li>{{ __('app.home.group') }}: {{ $student['group'] }}</li>
        </ul>
    </div>
</div>

<h5 class="mb-2">{{ __('app.home.subsystems') }}</h5>
<div class="d-flex gap-2 flex-wrap">
    <a class="btn btn-primary" href="{{ route('client.conferences.index') }}">{{ __('app.nav.client') }}</a>
    <a class="btn btn-primary" href="{{ route('employee.conferences.index') }}">{{ __('app.nav.employee') }}</a>
    <a class="btn btn-primary" href="{{ route('admin.index') }}">{{ __('app.nav.admin') }}</a>
</div>
@endsection
