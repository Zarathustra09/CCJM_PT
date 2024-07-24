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
                            <h4 class="card-title">Confirm Password</h4>
                            <p>{{ __('Please confirm your password before continuing.') }}</p>
                            <form method="POST" action="{{ route('password.confirm') }}" class="my-login-validation" novalidate="">
                                @csrf

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block ticker-btn">
                                        {{ __('Confirm Password') }}
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
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
