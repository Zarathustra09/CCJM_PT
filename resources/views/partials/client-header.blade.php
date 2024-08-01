<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="{{asset('img/logo-ccjm.png')}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ url("/") }}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://www.facebook.com/cityofcabuyaoforjesusmovementccjm"><i class="fa fa-info-circle"></i> About Us</a></li>
                    <li><a href="{{ url("/categories") }}"><i class="fa fa-list"></i> Category</a></li>
                    <li><a href="{{route("client.posts.create")}}"><i class="fa fa-briefcase"></i> Post a Job</a></li>
                    {{-- Profile Icon and Dropdown --}}
                    @auth
                        <li class="relative">
                            <a href="#" class="profile-icon">
                                <i class="fa fa-user-circle"></i>
                                <span>{{ (auth()->user()->name) }}</span><!-- Display user's name -->
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admin.dashboard')}}">Profile</a></li>
                                <li><a href="{{route('logout')}}">Logout</a></li>

                            </ul>
                        </li>
                    @else
                        <li><a class="ticker-btn" href="{{ route("choose") }}">Signup</a></li>
                        <li><a class="ticker-btn" href="{{ route("login") }}">Login</a></li>
                    @endauth
                    {{-- End of Profile Icon and Dropdown --}}
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
