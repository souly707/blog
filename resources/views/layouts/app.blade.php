<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('frontend/images/icon.png') }}">

        <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

        <!-- Cusom css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

        <!-- Modernizer js -->
        <script src="{{ asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>

    </head>

    <body>
        <div id="app">
            <!-- Main wrapper -->
            <div class="wrapper" id="wrapper">
                {{-- Header --}}

                @include('partial.frontend.header')
                {{-- /. Header --}}

                <main class="py-4">
                    @yield('content')
                </main>

                {{-- Footer --}}
                @include('partial.frontend.footer')
                {{-- /. Footer --}}
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/js/active.js') }}"></script>
    </body>

</html>