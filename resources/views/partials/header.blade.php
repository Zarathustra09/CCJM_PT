<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="index.html"><img src="img/logo-ccjm.png" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="{{url("/")}}">Home</a></li>
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="{{url("/categories")}}">Category</a></li>
              <li><a href="price.html">Price</a></li>
              {{-- <li><a href="blog-home.html">Blog</a></li>
              <li><a href="contact.html">Contact</a></li> --}}
              {{-- <li class="menu-has-children"><a href="">Pages</a>
                <ul>
                    <li><a href="elements.html">elements</a></li>
                    <li><a href="search.html">search</a></li>
                    <li><a href="single.html">single</a></li>
                </ul>
              </li> --}}
              <li><a class="ticker-btn" href="{{route("register")}}">Signup</a></li>
              <li><a class="ticker-btn" href="{{route("login")}}">Login</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
    </div>
  </header>