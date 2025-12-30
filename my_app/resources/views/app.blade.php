<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('app.app_title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('app.app_title') }}</a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-muted">
                {{ session('current_user.first_name') }} {{ session('current_user.last_name') }}
            </span>

            <button class="btn btn-outline-secondary" disabled>
                {{ __('app.nav.logout') }}
            </button>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
