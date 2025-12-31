<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('app.app_title'))</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav>

    @php
        $auth = session('auth_user');

        $role = $auth['role'] ?? null;

        $roleLabel = match ($role) {
            'admin' => __('app.nav.admin'),
            'employee' => __('app.nav.employee'),
            'client' => __('app.nav.client'),
            default => null,
        };

        $roleBadgeClass = match ($role) {
            'admin' => 'bg-danger',
            'employee' => 'bg-secondary',
            'client' => 'bg-primary',
            default => 'bg-light text-dark',
        };

        // helper: true jei dabartinis route prasideda nuo prefix
        $isActive = function (string $prefix) {
            return request()->routeIs($prefix . '*');
        };

        // mygtuko klasė: active -> btn-primary, else -> btn-outline-primary
        $navBtnClass = function (string $prefix) use ($isActive) {
            return $isActive($prefix) ? 'btn btn-primary' : 'btn btn-outline-primary';
        };
    @endphp

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ $auth ? route('client.conferences.index') : route('login') }}">
            {{ __('app.app_title') }}
        </a>

        <div class="ms-3 d-flex align-items-center gap-2">
            @if($auth && $roleLabel)
                <span class="badge {{ $roleBadgeClass }}">{{ $roleLabel }}</span>
            @endif
        </div>

        <div class="ms-auto d-flex align-items-center gap-2">

            {{-- NAV mygtukai rodomi tik prisijungus ir tik pagal rolę --}}
            @if($auth)
                {{-- Client: mato tik klientą --}}
                @if($role === 'client')
                    <a class="{{ $navBtnClass('client.conferences') }}" href="{{ route('client.conferences.index') }}">
                        {{ __('app.nav.client') }}
                    </a>
                @endif

                {{-- Employee: mato tik darbuotoją --}}
                @if($role === 'employee')
                    <a class="{{ $navBtnClass('employee.conferences') }}" href="{{ route('employee.conferences.index') }}">
                        {{ __('app.nav.employee') }}
                    </a>
                @endif

                {{-- Admin: mato admin (ir gali matyti visus, jei nori) --}}
                @if($role === 'admin')
                    <a class="{{ $navBtnClass('admin') }}" href="{{ route('admin.index') }}">
                        {{ __('app.nav.admin') }}
                    </a>

                    {{-- Jei adminui nori rodyti ir kitus posistemius, palik šituos --}}
                    <a class="{{ $navBtnClass('client.conferences') }}" href="{{ route('client.conferences.index') }}">
                        {{ __('app.nav.client') }}
                    </a>
                    <a class="{{ $navBtnClass('employee.conferences') }}" href="{{ route('employee.conferences.index') }}">
                        {{ __('app.nav.employee') }}
                    </a>
                @endif
            @endif

            {{-- Dešinė pusė: vartotojas + logout arba login/register --}}
            <div class="ms-2 d-flex align-items-center gap-2">
                @if($auth)
                    <span class="text-muted small d-none d-md-inline">
                        {{ $auth['first_name'] }} {{ $auth['last_name'] }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-secondary" type="submit">
                            {{ __('app.nav.logout') }}
                        </button>
                    </form>
                @else
                    <a class="{{ $isActive('login') ? 'btn btn-primary' : 'btn btn-outline-primary' }}" href="{{ route('login') }}">
                        {{ __('app.auth.login_button') }}
                    </a>
                    <a class="{{ $isActive('register') ? 'btn btn-primary' : 'btn btn-outline-primary' }}" href="{{ route('register') }}">
                        {{ __('app.auth.register_link') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>


</nav>

<main class="container py-4">
    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Validation errors (bendri) --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
