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
        <div class="welcome-budgetify d-flex justify-content-center flex-column">
            <div class="container">
                <nav class="navbar navbar-expand navbar-light fixed-top">
                    <div class="container">
                        <a class="navbar-brand d-flex" href="{{ '/' }}">
                            <img src="{{ asset('img/budgetify_logo_white.png') }}" alt="Example Navbar 1" class="mr-1 logo-white" height="30">
                            <span class="align-self-end text-white" style="font-size: 1.1rem;">udgetify</span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="inner-wrapper mt-auto mb-auto container">
                <div class="row">
                    <div class="col-md-6 col-xl-7 pt-sm-5 mb-5 mb-md-0">
                        <h1 class="welcome-heading display-4 text-white">Budgetify</h1>
                        <p class="text-white">Track expenses and manage your money effectively.</p>
                        <a href="{{ route('register') }}" class="btn btn-lg btn-outline-white btn-pill align-self-center">Register Now</a>
                    </div>
                    <div class="col-md-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="mt-3">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox d-block">
                                                    <input type="checkbox" class="custom-control-input mb-4" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-pill">Login</button>
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
