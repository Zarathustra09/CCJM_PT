@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/authentication.css') }}" rel="stylesheet">
    <body class="my-login-page">
    <section class="relative">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Reset Password</h4>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}" class="my-login-validation" novalidate="">
                                @csrf

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block ticker-btn">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Remembered your password? <a href="{{ route('login') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2024 &mdash; CCJM Agency
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
@endsection
