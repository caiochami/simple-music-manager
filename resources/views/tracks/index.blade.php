@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
                <h4 class="mb-2">Faixas</h4>
                <a href="{{route('tracks.create')}}" class="btn btn-outline-primary">Adicionar</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Artista</th>
                            <th>Album</th>
                            <th>Gênero</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tracks as $track)
                        <tr>
                        <td scope="row">{{$track->id}}</td>
                            <td>{{ $track->title }}</td>
                            <td>{{ $track->album->artist->name }}</td>
                            <td>{{ $track->album->title }}</td>
                            <td>{{ $track->genre->name }}</td>
                            
                            <td>
                                <a href="{{route('tracks.show', $track->id)}}" class="btn btn-outline-info btn-sm">Detalhes</a>
                                <a href="{{route('tracks.edit', $track->id)}}" class="btn btn-outline-success btn-sm">Editar</a>
                                <button  class="btn btn-outline-danger btn-sm" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                                <form method="post" id="destroy" action="{{route('tracks.destroy', $track->id)}}">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                </form>
                            </td>
                        </tr>
                        @empty

                            <tr colspan="3">
                                <td>Nenhum resultado encontrado</td>
                            </tr>

                        @endforelse
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection