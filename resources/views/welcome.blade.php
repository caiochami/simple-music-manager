@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
      <h1>{{config('app.name')}}</h1>
      <p class="lead text-muted">
          Gerencie suas músicas com este aplicativo          
      </p>
      <p>
        <a href="{{ route('albums.index')}}" class="btn btn-primary my-2">Acessar albuns</a>
        <a href="{{ route('tracks.index')}}" class="btn btn-secondary my-2">Acessar músicas</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      
      

      <div class="row">
        <div class="col-12">
            <h4>As faixas mais famosas</h4>
        </div>
        @forelse($tracks as $track)
        <div class="col-md-4">          
          <div class="card mb-4 shadow-sm">           
            <div class="card-body">
                <h5 class="card-title text-primary">{{$track->title}}</h5>      
                <p title="album" class="card-text">{{$track->album->title}}</p>
                <p title="artista" class="card-text text-info">{{$track->album->artist->name}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a 
                  href="{{route('tracks.show', $track->id)}}" 
                  type="button" 
                  class="btn btn-sm btn-outline-secondary">Ver</a>
                  
                </div>
                <small class="text-muted">{{$track->users_count ? $track->users_count :  'Nehuma' }} curtida(s)</small>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
            Nenhuma música disponível
        </div>
        @endforelse

        <div class="col-12">
            <h4>Os albuns mais famosos</h4>
        </div>
        @forelse($albums as $album)
        <div class="col-md-4">          
          <div class="card mb-4 shadow-sm">           
            <div class="card-body">
                <h5 class="card-title text-primary">{{$album->title}}</h5>                  
                <p title="artista" class="card-text text-info">{{$album->artist->name}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a 
                  href="{{route('albums.show', $album->id)}}" 
                  type="button" 
                  class="btn btn-sm btn-outline-secondary">Ver</a>
                  
                </div>
                <small class="text-muted">{{$album->users_count ? $album->users_count :  'Nehuma' }} curtida(s)</small>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
            Nenhuma música disponível
        </div>
        @endforelse
      </div>
    </div>
  </div>

    
@endsection