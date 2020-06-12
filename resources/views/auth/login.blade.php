@extends('layouts.skeleton')

@section('content')
<section class="py-3 bg-white">
    <h1 class="h2 text-center"><i class="fas fa-sign-in-alt mr-1"></i> Login</h1>
    <div class="container py-4">
        <div class="row justify-content-md-center px-4">
            <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 col-lg-8 mx-auto">
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
                        <div class="col-md-10 col-lg-8 mx-auto">
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
                        <div class="col-md-10 col-lg-8 mx-auto">
                            <div class="form-group mb-4">
                                <div class="custom-control custom-checkbox d-block">
                                    <input type="checkbox" class="custom-control-input mb-4" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 col-lg-10 offset-md-1 offset-lg-2">
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
                  <div class="row">
                      <div class="col-md-11 col-lg-8 offset-md-1 offset-lg-2">
                        <hr>
                        <p>Don't have an account ? <a class="btn btn-link" href="{{ route('register') }}">Register Now</a></p>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
