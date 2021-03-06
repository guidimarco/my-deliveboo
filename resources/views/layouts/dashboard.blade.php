<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'La tua dashboard: ' . Auth::user()->name)</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.9.6/dayjs.min.js" integrity="sha512-C2m821NxMpJ4Df47O4P/17VPqt0yiK10UmGl59/e5ynRRYiCSBvy0KHJjhp2XIjUJreuR+y3SIhVyiVilhCmcQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.9.6/plugin/customParseFormat.min.js" integrity="sha512-vAkK3r73UUkIPKpHGCp7Rhpt/xptuKZpavqwaCrDwjmbgPdqBlWZuFnLvAoN7jigf6Hg5NjZmZZM1xqJaiZfsQ==" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <!-- Chart.js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
</head>

<body>
    <!-- header (logo && nav bar) -->
    @include('partials.dashboard.header')

    <main id="main-dashboard" role="main">
        @yield('content')
    </main>

    @yield('script')
</body>

</html>
