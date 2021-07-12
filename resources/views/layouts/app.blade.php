<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Edify') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-003300 shadow-sm">
            <div class="container">
                {{-- @if (str_contains(url()->current(), 'home'))
                    <a class="navbar-brand text-white" href="{{ url('/home') }}">
                        {{ config('app.name', 'Edify') }}
                    </a>
                @endif --}}
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    {{ config('app.name', 'Edify') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fas fa-bars" style="color: #fff; font-size: 24px;"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (!(str_contains(url()->current(), 'home')))
                                @if ((str_contains(url()->current(), 'tutor')) || (str_contains(url()->current(), 'my_subjects')) || (str_contains(url()->current(), 'search_result')))
                                    <li class="nav-item nav-active">
                                        <a class="nav-link text-white border-right" href="{{ route('tutor.index') }}">
                                            <i class="fas fa-chalkboard-teacher" style="margin-right: 5px"></i>
                                            Tutors
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-white border-right" href="{{ route('tutor.index') }}">
                                            <i class="fas fa-chalkboard-teacher" style="margin-right: 5px"></i>
                                            Tutors
                                        </a>
                                    </li>
                                @endif

                                @if (str_contains(url()->current(), 'tutee'))
                                    <li class="nav-item nav-active">
                                        <a class="nav-link text-white border-right" href="{{ route('tutee.index') }}">
                                            <i class="fas fa-user-graduate" style="margin-right: 5px"></i>
                                            Tutees
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link text-white border-right" href="{{ route('tutee.index') }}">
                                            <i class="fas fa-user-graduate" style="margin-right: 5px"></i>
                                            Tutees
                                        </a>
                                    </li>
                                @endif
                            @endif

                            <li class="nav-item">
                                <a class="nav-link text-white border-right" href="{{ route('profile.index') }}">
                                    <i class="fas fa-user" style="margin-right: 5px"></i>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt" style="margin-right: 5px"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
</body>
</html>
