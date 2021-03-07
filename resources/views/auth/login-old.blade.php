
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title', 'DeliveBoo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- FontAwesome CDN -->
    <script src="https://kit.fontawesome.com/43febffcb7.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header (logo && nav bar) -->
    <header class="mb-5">
        <nav id="guest-navbar" class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <!-- Left Side Of Navbar - Brand Logo -->
                <div class="d-flex align-items-center">
                    <a class="navbar-brand logo-brand m-0 p-0 d-flex align-items-center" href="{{ url('/') }}">
                        <img src="{{ asset('/images/logo-deliveboo.png') }}" alt="brand logo Deliveroo">
                        <h5 class="m-0 ml-2 text-dark">DeliveBoo</h5>
                    </a>
                </div>

                <!-- Right Side Of Navbar MOBILE - Hamburger menu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <!-- Visible -> username -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <!-- DropdownMenu -->
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!-- Link to dashboard -->
                                <a class="dropdown-item" href="{{ route('admin.home') }}">
                                    Dashboard
                                </a>

                                <!-- Logout -->
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <!-- END Logout -->
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </div> {{-- Fine Container --}}
        </nav>
    </header>


<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">






                    </div>
                </div>
            </div>
        </main>
        <!-- footer -->

    </body>
    </html>
