<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Budgetify</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ '/' }}">
                    <img src="{{ asset('img/budgetify_logo.png') }}" alt="Example Navbar 1" class="mr-1" height="30">
                    <span class="align-self-end" style="font-size: 1.1rem;">udgetify</span>
                </a>
                @yield('right_nav_component')
            </div>
        </nav>
        @yield('content')
        <script src="{{ 'js/app.js' }}"></script>
        @yield('scripts')
    </body>
</html>
