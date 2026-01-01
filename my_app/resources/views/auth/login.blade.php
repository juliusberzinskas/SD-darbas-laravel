@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">
        <div class="text-center mb-4">

            <div class="text-center mb-4">
                <div class="mb-3">
                    <img src="{{ asset('images/logo.png') }}"
                        alt="Logo"
                        class="img-fluid"
                        style="max-height: 200px;">
            </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               name="email"
                               placeholder="name@example.com"
                               value="{{ old('email') }}">
                        <label for="email">{{ __('app.user.email') }}</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password"
                               placeholder="Password">
                        <label for="password">{{ __('app.auth.password') }}</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        {{ __('app.auth.login_button') }}
                    </button>

                    <div class="text-center mt-3">
                        <span class="text-muted">{{ __('app.auth.no_account') }}</span>
                        <a href="{{ route('register') }}">{{ __('app.auth.register_link') }}</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-3 small text-muted">
            © {{ date('Y') }} {{ __('app.app_title') }}
        </div>
    </div>
</div>
@endsection
