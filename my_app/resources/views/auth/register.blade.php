@extends('layouts.app')

@section('content')
<h1 class="mb-3">Registracija</h1>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Vardas</label>
                <input type="text" name="first_name"
                       class="form-control @error('first_name') is-invalid @enderror"
                       value="{{ old('first_name') }}">
                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Pavardė</label>
                <input type="text" name="last_name"
                       class="form-control @error('last_name') is-invalid @enderror"
                       value="{{ old('last_name') }}">
                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">El. paštas</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Slaptažodis</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary" type="submit">Sukurti paskyrą</button>
            <a class="btn btn-link" href="{{ route('login') }}">Grįžti į prisijungimą</a>
        </form>
    </div>
</div>
@endsection