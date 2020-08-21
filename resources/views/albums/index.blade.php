@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
                <h4 class="mb-2">Albuns</h4>
                <a href="{{route('albums.create')}}" class="btn btn-outline-primary">Adicionar</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Ano</th>
                            <th>Artista</th>
                            <th>Músicas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($albums as $album)
                        <tr>
                        <td scope="row">{{$album->id}}</td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->year }}</td>
                            <td>{{ $album->artist->name }}</td>
                            <td>{{ $album->tracks_count }}</td>
                            <td>
                                <a href="{{route('albums.show', $album->id)}}" class="btn btn-outline-info btn-sm">Detalhes</a>
                                <a href="{{route('albums.edit', $album->id)}}" class="btn btn-outline-success btn-sm">Editar</a>
                                <button  class="btn btn-outline-danger btn-sm" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                                <form method="post" id="destroy" action="{{route('albums.destroy', $album->id)}}">
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