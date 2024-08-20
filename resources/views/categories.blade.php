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
    <title>Job Listing</title>

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
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            Job category
                        </h1>
                        <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="category.html"> Job category</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->

        <!-- Start post Area -->
        <section class="post-area section-gap">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8 post-list">
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

                    </div>
                    <div class="col-lg-4 sidebar">
                        <div class="single-slidebar">

                            <h4>Jobs by Location</h4>

{{--                            <form action="#" class="serach-form-area">--}}
{{--                                <div class="row">--}}


{{--                                    <div class="col-lg-12 form-cols py-1">--}}
{{--                                        <div class="default-select" id="default-selects2">--}}
{{--                                            <select>--}}
{{--												<option value="1">Select area</option>--}}
{{--												<option value="2">Dhaka</option>--}}
{{--												<option value="3">Rajshahi</option>--}}
{{--												<option value="4">Barishal</option>--}}
{{--												<option value="5">Noakhali</option>--}}
{{--											</select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
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
                            <h4>Jobs by Category</h4>
{{--                                                    <form action="#" class="serach-form-area">--}}
{{--                                                        <div class="row">--}}


{{--                                                            <div class="col-lg-12 form-cols py-1">--}}
{{--                                                                <div class="default-select" id="default-selects2">--}}
{{--                                                                    <select>--}}
{{--                                                                        <option value="1">All Category</option>--}}
{{--                                                                        <option value="2">Medical</option>--}}
{{--                                                                        <option value="3">Technology</option>--}}
{{--                                                                        <option value="4">Goverment</option>--}}
{{--                                                                        <option value="5">Development</option>--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
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
        <section class="callto-action-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content col-lg-9">
                        <div class="title text-center">
                            <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <a class="primary-btn" href="#">I am a Candidate</a>
                            <a class="primary-btn" href="#">Request Free Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End calto-action Area -->

        <!-- start footer Area -->
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



