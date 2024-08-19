<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    </head>
    <body>

        @include('partials.header')


        <!-- start banner Area -->
        <section class="banner-area relative" id="home">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-center">
                    <div class="banner-content col-lg-12">
                        <h1 class="text-white">
                            <span>1500+</span> Jobs posted last week
                        </h1>
                        <form action="search.html" class="serach-form-area">
                            <div class="row justify-content-center form-wrap">
                                <div class="col-lg-4 form-cols">
                                    <input type="text" class="form-control" name="search" placeholder="what are you looging for?">
                                </div>
                                <div class="col-lg-3 form-cols">
                                    <div class="default-select" id="default-selects"">
                                        <select>
                                            <option value="1">Select area</option>
                                            <option value="2">Lorem Ipsum</option>
                                            <option value="3">Lorem Ipsum</option>
                                            <option value="4">Lorem Ipsum</option>
                                            <option value="5">Lorem Ipsum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 form-cols">
                                    <div class="default-select" id="default-selects2">
                                        <select>
                                            <option value="1">All Category</option>
                                            <option value="2">Medical</option>
                                            <option value="3">Technology</option>
                                            <option value="4">Goverment</option>
                                            <option value="5">Development</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 form-cols">
                                    <button type="button" class="btn btn-info">
                                      <span class="lnr lnr-magnifier"></span> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="text-white"> <span>Search by tags:</span> Tecnology, Business, Consulting, IT Company, Design, Development</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->

        <!-- Start features Area -->
        <section class="features-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature">
                            <h4>Searching?</h4>
                            <p>
                                Apply for a job!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature">
                            <h4>Need Fixing?</h4>
                            <p>
                                Post a job!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature">
                            <h4>Verified Pros</h4>
                            <p>
                                Work with trusted experts.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-feature">
                            <h4>Instant Alerts</h4>
                            <p>
                                Stay updated on the go.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- End features Area -->

        <!-- Start popular-post Area -->
        {{-- <section class="popular-post-area pt-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="active-popular-post-carusel">
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/p1.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img src="img/p2.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img src="img/p1.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img src="img/p2.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img src="img/p1.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="thumb">
                                <img src="img/p2.png" alt="">
                                <a class="btns text-uppercase" href="#">view job post</a>
                            </div>
                            <div class="details">
                                <a href="#"><h4>Creative Designer</h4></a>
                                <h6>Los Angeles</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End popular-post Area -->

        <!-- Start feature-cat Area -->
        <section class="feature-cat-area pt-100" id="category">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-60 col-lg-10">
                        <div class="title text-center">
                            <h1 class="mb-10">Featured Categories</h1>
                            {{-- <p>Who are in extremely love with eco friendly system.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o1.png" alt="">
                            </a>
                            <p>Accounting</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o2.png" alt="">
                            </a>
                            <p>Development</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o3.png" alt="">
                            </a>
                            <p>Technology</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o4.png" alt="">
                            </a>
                            <p>Media & News</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o5.png" alt="">
                            </a>
                            <p>Medical</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="single-fcat">
                            <a href="category.html">
                                <img src="img/o6.png" alt="">
                            </a>
                            <p>Goverment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End feature-cat Area -->

        <!-- Start post Area -->
        <section class="post-area section-gap">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8 post-list">
{{--                        <ul class="cat-list">--}}
{{--                            <li><a href="#">Recent</a></li>--}}
{{--                            <li><a href="#">Full Time</a></li>--}}
{{--                            <li><a href="#">Intern</a></li>--}}
{{--                            <li><a href="#">part Time</a></li>--}}
{{--                        </ul>--}}
                        @foreach($allJobs as $job)
                            <div class="single-post d-flex flex-row mb-4 p-3 border rounded shadow-sm">
                                <div class="thumb">
                                    {{-- <img src="{{asset('storage/' . $job->image)}}" alt=""> --}}
                                    <ul class="tags" style="padding-right: 20px; min-width: 250px;">
                                        <li>
                                            <a href="#">{{$job->category->category_description}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="details flex-grow-1">
                                    <div class="title d-flex flex-row justify-content-between">
                                        <div class="titles">
                                            <a href="single.html"><h4>{{$job->job_title}}</h4></a>
                                            <h6>{{$job->user->name}}</h6> <!-- Assuming the user's name is stored in 'name' field -->
                                        </div>
                                        {{--                                    <ul class="btns">--}}
                                        {{--                                        <li><a href="#">Apply</a></li>--}}
                                        {{--                                    </ul>--}}
                                    </div>
                                    <hr>
                                    <p>{{$job->job_description}}</p>
                                    <h5 style="color: {{$job->status == 0 ? 'green' : 'red'}}">Job Status: {{$job->status == 0 ? 'Open' : 'Taken'}}</h5><!-- Replace with dynamic content if available -->
                                    <div class="location mt-3">
                                        <p><span class="lnr lnr-map"></span> {{ $job->region_name }}, {{ $job->province_name }}, {{ $job->city_name }}, {{ $job->barangay_name }}</p>
                                    </div>
                                    <p class="address mt-3"><span class="lnr lnr-database"></span> Salary: {{$job->salary}}</p>
                                </div>
                            </div>
                        @endforeach

                        <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{url("/categories")}}">Load More job Posts</a>

                    </div>
                    <div class="col-lg-4 sidebar">
                        <div class="single-slidebar">
                            <h4>Sort by Location</h4>
                            <ul class="cat-list">
                                @foreach($topCities as $cityName => $cityData)
                                    <li>
                                        <a class="justify-content-between d-flex">
                                            <p>{{ $cityName }}</p>
                                            <span>{{ $cityData['count'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="single-slidebar">
                            <h4>Top rated job posts</h4>
                            <div class="active-relatedjob-carusel">
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Creative Art Designer</h4></a>
                                    <h6>Premium Labels Limited</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Job Nature: Full time</h5>
                                    <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                                    <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                    <a href="#" class="btns text-uppercase">Apply job</a>
                                </div>
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Creative Art Designer</h4></a>
                                    <h6>Premium Labels Limited</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Job Nature: Full time</h5>
                                    <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                                    <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                    <a href="#" class="btns text-uppercase">Apply job</a>
                                </div>
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Creative Art Designer</h4></a>
                                    <h6>Premium Labels Limited</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Job Nature: Full time</h5>
                                    <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
                                    <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                    <a href="#" class="btns text-uppercase">Apply job</a>
                                </div>
                            </div>
                        </div> --}}

                        <div class="single-slidebar">
                            <h4>Sort by Category</h4>
                            <ul class="cat-list">
                                @foreach($topCategories as $categoryName => $count)
                                    <li>
                                        <a class="justify-content-between d-flex">
                                            <p>{{ $categoryName }}</p>
                                            <span>{{ $count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="single-slidebar">
                            <h4>Carrer Advice Blog</h4>
                            <div class="blog-list">
                                <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                                    <a href="single.html"><h4>Home Audio Recording <br>
                                    For Everyone</h4></a>
                                    <div class="meta justify-content-between d-flex">
                                        <p>
                                            02 Hours ago
                                        </p>
                                        <p>
                                            <span class="lnr lnr-heart"></span>
                                            06
                                             <span class="lnr lnr-bubble"></span>
                                            02
                                        </p>
                                    </div>
                                </div>
                                <div class="single-blog " style="background:#000 url(img/blog2.jpg);">
                                    <a href="single.html"><h4>Home Audio Recording <br>
                                    For Everyone</h4></a>
                                    <div class="meta justify-content-between d-flex">
                                        <p>
                                            02 Hours ago
                                        </p>
                                        <p>
                                            <span class="lnr lnr-heart"></span>
                                            06
                                             <span class="lnr lnr-bubble"></span>
                                            02
                                        </p>
                                    </div>
                                </div>
                                <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                                    <a href="single.html"><h4>Home Audio Recording <br>
                                    For Everyone</h4></a>
                                    <div class="meta justify-content-between d-flex">
                                        <p>
                                            02 Hours ago
                                        </p>
                                        <p>
                                            <span class="lnr lnr-heart"></span>
                                            06
                                             <span class="lnr lnr-bubble"></span>
                                            02
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </section>
        <!-- End post Area -->


        <!-- Start callto-action Area -->
{{--        <section class="callto-action-area section-gap" id="join">--}}
{{--            <div class="container">--}}
{{--                <div class="row d-flex justify-content-center">--}}
{{--                    <div class="menu-content col-lg-9">--}}
{{--                        <div class="title text-center">--}}
{{--                            <h1 class="mb-10 text-white">Join us today without any hesitation</h1>--}}
{{--                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>--}}
{{--                            <a class="primary-btn" href="#">I am a Candidate</a>--}}
{{--                            <a class="primary-btn" href="#">Request Free Demo</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- End calto-action Area -->

        <!-- Start download Area -->
        {{-- <section class="download-area section-gap" id="app">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 download-left">
                        <img class="img-fluid" src="img/d1.png" alt="">
                    </div>
                    <div class="col-lg-6 download-right">
                        <h1>Download the <br>
                        Job Listing App Today!</h1>
                        <p class="subs">
                            It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.
                        </p>
                        <div class="d-flex flex-row">
                            <div class="buttons">
                                <i class="fa fa-apple" aria-hidden="true"></i>
                                <div class="desc">
                                    <a href="#">
                                        <p>
                                            <span>Available</span> <br>
                                            on App Store
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="buttons">
                                <i class="fa fa-android" aria-hidden="true"></i>
                                <div class="desc">
                                    <a href="#">
                                        <p>
                                            <span>Available</span> <br>
                                            on Play Store
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End download Area -->

        @include('partials.footer')


        <!-- End footer Area -->

        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/parallax.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>



