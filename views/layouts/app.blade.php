<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            --primary-color: #232741;
            --secondary-color: #7289DA;
            --font-family-primary: 'MinecraftiaRegular', 'serif';
            --font-family-secondary: 'Trade Gothic LT W01 Cn No-_18', sans-serif;
            --font-color-light: white;
            --font-size: 14px;
            --minecraft-background: url("{{ theme_asset('img/bg-wool-dark.png') }}");
            --minecraft-background-top: url("{{ theme_asset('img/trans-bottom-darkwool.png') }}");
            --minecraft-background-bottom: url("{{ theme_asset('img/trans-top-darkwool.png') }}");
        }
    </style>
    <link href="{{ theme_asset('css/style.css') }}" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: 'MinecraftiaRegular';
            src: url('{{ theme_asset('fonts/MinecraftiaRegular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    @stack('styles')
</head>

<body>
<div id="app">
    @include('elements.navbar')

    <main>
        <div class="container">
            @include('elements.session-alerts')
        </div>

        @yield('content')
    </main>
</div>

<footer class="text-white py-4 text-center">
    <div class="copyright">
        <div class="container">
            {{ setting('copyright') }} | @lang('messages.copyright')
        </div>
    </div>
</footer>

@stack('footer-scripts')

</body>
</html>
