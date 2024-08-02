@extends('layouts.app')

@section('content')
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <ul class="cat-list">
                        <li><a href="#">Recent</a></li>
                        <li><a href="#">Full Time</a></li>
                        <li><a href="#">Intern</a></li>
                        <li><a href="#">part Time</a></li>
                    </ul>
                    @foreach($jobs as $job)
                        <div class="single-post d-flex flex-row">
                            <div class="thumb">
{{--                                <img src="{{asset('storage/' . $job->image)}}" alt="">--}}
                                <ul class="tags">
                                    <li>
                                        <a href="#">{{$job->category->category_description}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details">
                                <div class="title d-flex flex-row justify-content-between">
                                    <div class="titles">
                                        <a href="single.html"><h4>{{$job->job_title}}</h4></a>
                                        <h6>{{$job->user->name}}</h6> <!-- Assuming the user's name is stored in 'name' field -->
                                    </div>
                                    <ul class="btns">
                                        <li><a href="#">Apply</a></li>
                                    </ul>
                                </div>
                                <p>
                                    {{$job->job_description}}
                                </p>
                                <h5>Job Nature: Full time</h5> <!-- Replace with dynamic content if available -->
                                <p>
                                    <span class="lnr lnr-map"></span>
                                <p>Region: {{ $job->region_name }}</p>
                                <p>Province: {{ $job->province_name }}</p>
                                <p>City: {{ $job->city_name }}</p>
                                <p>Barangay: {{ $job->barangay_name }} </p>
                                </p>
                                <p class="address"><span class="lnr lnr-database"></span> {{$job->salary}}</p>
                            </div>
                        </div>
                    @endforeach

                    <a class="text-uppercase loadmore-btn mx-auto d-block" href="{{url("/categories")}}">Load More job Posts</a>

                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Sort by Location</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Metro Manila</p><span>37</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Cebu</p><span>57</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Davao City</p><span>33</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Quezon City</p><span>36</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Manila</p><span>47</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Taguig</p><span>27</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Makati</p><span>17</span></a></li>
                        </ul>
                    </div>



                    <div class="single-slidebar">
                        <h4>Sort by Category</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Technology</p><span>37</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
                            <li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </section>

@endsection
