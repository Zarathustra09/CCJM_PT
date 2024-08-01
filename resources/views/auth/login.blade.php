@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/authentication.css') }}" rel="stylesheet">
    <div class="container py-5 flex-grow-1">
        <div class="row fullscreen align-items-center justify-content-center">
            <body class="my-login-page">
            <section class="relative">
                <div class="container h-100">
                    <div class="row justify-content-md-center h-100">
                        <div class="card-wrapper">
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title">Login</h4>
                                    <form method="POST" action="{{ route('login') }}" class="my-login-validation" novalidate="">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">E-Mail Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="float-right">
                                                        Forgot Password?
                                                    </a>
                                                @endif
                                            </label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-eye>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember" class="custom-control-label">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <button type="submit" class="btn btn-primary btn-block ticker-btn">
                                                Login
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            Don't have an account? <a href="{{ route('choose') }}">Create One</a>
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
        </div>
    </div>

@endsection
