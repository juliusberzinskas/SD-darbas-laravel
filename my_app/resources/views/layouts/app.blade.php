<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('app.app_title'))</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ __('app.app_title') }}
        </a>

        <div class="d-flex gap-2">
            <a class="btn btn-outline-primary" href="{{ route('client.conferences.index') }}">
                {{ __('app.nav.client') }}
            </a>
            <a class="btn btn-outline-primary" href="{{ route('employee.conferences.index') }}">
                {{ __('app.nav.employee') }}
            </a>
            <a class="btn btn-outline-primary" href="{{ route('admin.index') }}">
                {{ __('app.nav.admin') }}
            </a>
        </div>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-muted">
                {{ session('current_user.first_name', 'Demo') }}
                {{ session('current_user.last_name', 'User') }}
            </span>

            <button class="btn btn-outline-secondary" disabled>
                {{ __('app.nav.logout') }}
            </button>
        </div>
    </div>
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
