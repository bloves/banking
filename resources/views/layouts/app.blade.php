<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="h-100">

        @auth
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">        
            <div class="container" style="width:800px; margin:0 auto;">
                <h4 style="text-align: center;"> ABC BANK </h4>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href={{route('home')}}><i class="fa fa-home"></i> Home </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href={{route('deposit')}}><i class="fa fa-upload"></i> Deposit</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href={{route('withdraw')}}><i class="fa fa-download"></i> Withdraw</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href={{route('transfer')}}><i class="fa fa-exchange"></i> Transfer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href={{route('statement')}}><i class="fa fa-file-word-o"></i> Statement</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                            {{ __('Logout') }}
                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                      </li>
                    </ul>
                  </div>
             
            </div>
        </nav>
        @endauth
        <main class="py-4 h-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
