@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/client-agent.css') }}" rel="stylesheet">
    @endpush
    <div class="section over-hide">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section text-center py-5 py-md-0">
                        <input class="pricing" type="checkbox" id="pricing" name="pricing"/>
                        <label for="pricing"><span class="block-diff">customer<span class="float-right">agent</span></span></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="pricing-wrap">
                                        <h4 class="mb-5">Customer</h4>
                                        <h2 class="mb-2"><sup></sup>Need Fixing?<sup></sup></h2>
                                        <p class="mb-1"><i class="uil uil-location-pin-alt size-22"></i></p>
                                        <p class="mb-4">Call Us</p>
                                        <a href="{{ route('register') . '?role=0' }}" class="link">Post a Job</a>
                                        <div class="img-wrap img-2">
                                            <img src="https://assets.codepen.io/1462889/sea.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="pricing-wrap">
                                        <h4 class="mb-5">Agent</h4>
                                        <h2 class="mb-2"><sup></sup>Join us!<sup></sup></h2>
                                        <p class="mb-1"><i class="uil uil-location-pin-alt size-22"></i></p>
                                        <p class="mb-4">Be a part of CCJM</p>
                                        <a href="{{ route('register') . '?role=1' }}" class="link">Sign up</a>
                                        <div class="img-wrap img-2">
                                            <img src="https://assets.codepen.io/1462889/grass.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
