<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/budgetify_favicon_76.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/budgetify_favicon_96.png') }}">
        <title>{{ config('app.name', 'Budgetify') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <img src="{{ asset('img/budgetify_logo.png') }}" alt="Example Navbar 1" class="mr-1" height="30">
                    <span class="align-self-end" style="font-size: 1.1rem;">udgetify</span>
                </a>
                @yield('right_nav_component')
            </div>
        </nav>
        @yield('content')
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </body>
</html>
