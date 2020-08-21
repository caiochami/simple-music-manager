@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
               <h4 class="mb-2">Exbindo album: {{$album->title}}</h4>
               <div>
                    <a href="{{route('albums.edit', $album->id)}}" class="btn btn-outline-success">Editar</a>
                    <button  class="btn btn-outline-danger" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                    <form method="post" id="destroy" action="{{route('albums.destroy', $album->id)}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
               </div>
            </div>
            <div class="col-12 col-md-6 mt-2">
                <h5>Detalhes</h5>
                <ul>
                    <li>Artista: {{ $album->artist->name}}</li>
                    <li>Ano: {{ $album->year}}</li>
                </ul>
                <h5>Músicas</h5>
                <ul>
                    @forelse($album->tracks as $track)
                    <li>{{ $track->title }}</li>
                    @empty
                    <li>Nenhuma música encontrada!</li>
                    @endforelse
                </ul>
                <p>Total: {{$album->tracks->count()}}</p>
            </div>
          
        </div>
       
    </div>
@endsection