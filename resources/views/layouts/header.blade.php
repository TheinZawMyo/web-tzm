<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color sticky-top">

  <!-- Navbar brand -->
  <a class="navbar-brand text-success font-weight-bold" style="font-size: 30px" href="{{ route('index') }}"><span
      class="text-danger">Share</span>IT</a>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent-6">

    <!-- Links -->


    <ul class="navbar-nav ml-5 mr-auto font-weight-bold">
      <li class="p-3 nav-item"><a href="{{ route('webDesign') }}">Web Design</a></li>
      <li class="p-3 nav-item"><a href="{{ route('framework') }}">Framework</a></li>
      <li class="p-3 nav-item"><a href="{{ route('programming') }}">Programming</a></li>
      <li class="p-3 nav-item"><a href="{{ route('knowledge') }}">Knowledge</a></li>
      @if (Route::has('login'))
      @auth
      <li class="p-3 nav-item"><a href="{{ route('home') }}">Dashboard</a></li>
      @else
      <li class="p-3 nav-item"><a href="{{ route('login') }}">Sign In</a></li>
      @if (Route::has('register'))
      <li class="p-3 nav-item btn btn-success"><a href="{{ route('register') }}" class="text-white">Get Started</a></li>
      @endif
      @endauth
      @endif

    </ul>
    <!-- Links -->

    <form class="mr-4">
      <div class="md-form">
        <input class="form-control w-100" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-success">Search</button>
      </div>
    </form>
  </div>
  <!-- Collapsible content -->
  <button class="aside-btn border-0 bg-transparent mr-5"><i class="fa fa-bars"></i></button>
</nav>
<!--/.Navbar-->
<div id="nav-aside">
  <!-- nav -->
  <div class="section-row">
    <ul class="nav-aside-menu">
      <li class="p-3 nav-item"><a href="{{ route('webDesign') }}">Web Design</a></li>
      <li class="p-3 nav-item"><a href="{{ route('framework') }}">Framework</a></li>
      <li class="p-3 nav-item"><a href="{{ route('programming') }}">Programming</a></li>
      <li class="p-3 nav-item"><a href="{{ route('knowledge') }}">Knowledge</a></li>
      @if (Route::has('login'))
      @auth
      <li class="p-3 nav-item"><a href="{{ route('home') }}">Dashboard</a></li>
      @else
      <li class="p-3 nav-item"><a href="{{ route('login') }}">Sign In</a></li>
      @if (Route::has('register'))
      <li class="p-3 nav-item"><a href="{{ route('register') }}">Get Started</a></li>
      @endif
      @endauth
      @endif
    </ul>
  </div>
</div>