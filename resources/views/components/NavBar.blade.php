<nav class="navbar fixed-top navbar-expand-lg  bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/CORA.png') }}" height="50px" alt="CORA"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('products.index')}}">Comprar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('products.create')}}">Vender</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('categories.index')}}">Todas</a></li>
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categories.show',$category)}}">{{$category->nombre}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('posts.index')}}" >Blog</a>
        </li>
      </ul>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      @if (Route::has('login'))
      @auth
      @if (Auth::user()->rol == 'admin')
   <li class="nav-item">
    <a href="{{ route('admin.home')}}" class="nav-link ">Dashboard</a>
   </li>
    @endif
          @else
          <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link active">Log in</a>
        </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link active">Register</a>
          </li>
            @endif
          @endauth
      </div>
      @endif
    </ul>

      @if (Cart::content()->count())
      <a href="/carrito" class="nav-link position-relative" style="margin-right: 30px">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-cart" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
          {{Cart::content()->count()}}
          <span class="visually-hidden">unread messages</span>
        </span>
      </a>
      @endif
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      @auth
      <x-dropdown-button type='light'/>
  @endauth
    
    </div>
  </div>
</nav>