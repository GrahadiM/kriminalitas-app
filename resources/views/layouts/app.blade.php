<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Abdurrahman GM">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @yield('css')

</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page"
                                href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('list')) ? 'active' : '' }}" href="{{ route('admin.list') }}">Daftar Kriminal</a>
                        </li>
                        @if (auth()->user()->hasRole('pimpinan'))
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('riwayat')) ? 'active' : '' }}" href="{{ route('pimpinan.riwayat') }}">Riwayat</a>
                            </li>
                        @endif
                    </ul>
                    @if (Route::has('login'))
                        <div class="d-flex">
                            @auth
                                <div class="me-2">
                                    {{ Auth::user()->name }}
                                </div>
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-info">{{ __('Login') }}</a>
                                @endif

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-sm btn-outline-warning ms-2">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <div style="margin-top: 100px;">
            @yield('content')
        </div>
    </main>

    <!-- bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- end bootstrap 5 -->

    @stack('scripts')

</body>

</html>
