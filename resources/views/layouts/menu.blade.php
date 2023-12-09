<div class="myheader @if (Request::segment(1) != NULL) {{' myheader2'}}@endif">
  <nav class="navbar navbar-expand-lg navbar-light">
    @if (Request::segment(1) == NULL )
    <div class="talldiv"></div>

    @endif

    <div class="container">
      <a class="navbar-brand" href="{{Route('home')}}">
        <img src="{{asset('img/logo.png')}}" alt="" style="width: 100px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{Route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{Route('menu')}}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{Route('categories')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{Route('contact')}}">Contact Us</a>
          </li>

          <li class="nav-item">

            <a class="nav-link active" aria-current="page" href="{{route('cart')}}"><img class="carticon" src="{{asset('img/cart.png')}}"  >
              <span class="number">{{CartCount()}}</span>
            </a>
          </li>
          <li class="nav-item">
            @if (auth('web')->user()?->id != NULL)
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{Str::substr(auth()->user()->name, 0, 10) }}..
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{Route('orders')}}">My Orders</a></li>
              </ul>
            </div>
            {{-- <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-user"></i> 
              {{Str::substr(auth()->user()->name, 0, 10) }}..</a> --}}

            @else
            <a class="nav-link active" aria-current="page" href="{{Route('login')}}"><button class="btn btn-success loginbutton">Log in</button></a>
            @endif
          </li>

        </ul>
      </div>

    </div>
  </nav>
</div>
