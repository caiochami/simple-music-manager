<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @if(auth()->check())
        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">Início <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Route::is('artists.*') ? 'active' : '' }}">
          <a class="nav-link " href="{{route('artists.index')}}">Artistas <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item {{ Route::is('albums.*') ? 'active' : '' }}">
          <a class="nav-link " href="{{route('albums.index')}}">Albuns <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item {{ Route::is('genres.*') ? 'active' : '' }}">
          <a class="nav-link " href="{{route('genres.index')}}">Gênero <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item {{ Route::is('tracks.*') ? 'active' : '' }}">
          <a class="nav-link " href="{{route('tracks.index')}}">Músicas <span class="sr-only">(current)</span></a>
        </li>
        
       
      
        @endif
      </ul>
      @if(auth()->check())
      <span class="text-secondary mr-2">{{ auth()->user()->name }}</span>
      <button onclick="document.querySelector('#logout').submit();" class="btn btn-outline-primary">Sair</button>
      <form method="POST" id="logout" action="{{route('logout')}}">{{csrf_field()}}</form>
      @else

      <a href="{{ route('login') }}" class="btn mr-1 btn-light {{ Route::is('login') ? 'active' : '' }}">Login</a>
      <a href="{{ route('register')}}" class="btn btn-light {{ Route::is('register') ? 'active' : '' }} ">Inscrever</a>

      @endif
    </div>
  </nav>

