@extends('layouts.app')

@section('content')
<section class="py-3 bg-white">
    <h1 class="h2 text-center"><i class="far fa-address-book mr-1"></i> Register</h1>
    <div class="container py-4">
        <div class="row justify-content-md-center px-4">
            <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
                <form method="POST" action="{{ route('register') }}" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 col-lg-8 mx-auto">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
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
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 col-lg-10 offset-md-1 offset-lg-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-pill">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-11 col-lg-8 offset-md-1 offset-lg-2">
                        <hr>
                        <p>Already have an account ? <a class="btn btn-link" href="{{ route('login') }}">Login Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
