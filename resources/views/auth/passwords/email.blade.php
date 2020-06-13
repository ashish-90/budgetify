@extends('layouts.app')

@section('content')
<section class="py-3 bg-white">
    <h1 class="h2 text-center"><i class="fas fa-redo mr-1"></i> Reset Password</h1>
    <div class="container py-4">
        <div class="row justify-content-md-center px-4">
            <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="mt-4">
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
                        <div class="col-md-11 col-lg-10 offset-md-1 offset-lg-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-pill">Send Password Reset Link</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-11 col-lg-8 offset-md-1 offset-lg-2">
                        <hr>
                        <p class="float-right"><a class="btn btn-link" href="{{ route('login') }}">Login</a> | <a class="btn btn-link" href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
