@extends('layouts.app')

@section('content')
<h1 class="mb-3">{{ __('app.user.edit') }}</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user['id']) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">{{ __('app.user.first_name') }}</label>
                <input type="text"
                       name="first_name"
                       class="form-control @error('first_name') is-invalid @enderror"
                       value="{{ old('first_name', $user['first_name']) }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('app.user.last_name') }}</label>
                <input type="text"
                       name="last_name"
                       class="form-control @error('last_name') is-invalid @enderror"
                       value="{{ old('last_name', $user['last_name']) }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('app.user.email') }}</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $user['email']) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">
                    {{ __('app.conference.update') }}
                </button>

                <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">
                    {{ __('app.user.users') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection