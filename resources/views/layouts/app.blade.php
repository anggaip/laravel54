<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title') {{ config('app.name') }}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/prism.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!-- Scripts -->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    </head>
    <body>

        @include('frontend.header')

        @yield('content')

        @include('frontend.footer')

        <!-- Scripts -->
            <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/jquery.scrolly.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/jquery.scrollzer.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/skel.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/util.js') }}"></script>
            <!--[if lte IE 8]><script src="{{ asset('frontend/assets/js/ie/respond.min.js') }}"></script><![endif]-->
            <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
            <script src="{{ asset('js/prism.js') }}"></script>

    </body>
</html>