<header>
    <nav id="admin-navbar" class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <!-- Left Side Of Navbar - Brand Logo -->
            <div class="d-flex align-items-center">
                <a class="navbar-brand logo-brand m-0 p-0 d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('/images/logo-white.svg') }}" alt="brand logo Deliveroo">
                </a>
            </div>


            <div class="right-links">
                <!-- nav menu -->
                <ul class="navbar-nav flex-row ml-auto">

                    <!-- link per visitare homepage guest -->
                    <li class="nav-item ml-2">
                        <a class="btn btn-secondary-brand btn-sm" href="{{ route('home')}}">
                            Vai alla homepage
                        </a>
                    </li>

                    <!-- link logout -> redirect -->
                    <li class="ml-2">
                        <a class="btn btn-secondary-brand-alt btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- Right Side Of Navbar MOBILE - Hamburger menu -->

        </div> {{-- Fine Container --}}
    </nav>
</header>

{{--
<header>
    <nav class="navbar navbar-expand-md flex-nowrap">
        <!-- Left Side Of Navbar - Brand Logo -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand logo-brand m-0 p-0 d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('/images/brand-logo.png') }}" alt="brand logo Deliveroo">
            </a>
        </div>


        <!-- nav menu -->
        <ul class="navbar-nav flex-row ml-auto">

            <!-- link per visitare homepage guest -->
            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('home')}}">
                    Visita il sito
                </a>
            </li>

            <!-- link logout -> redirect -->
            <li class="nav-item ml-2">
                <a class="btn btn-outline-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
</header> --}}
