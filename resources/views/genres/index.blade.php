@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row justify-content-between mb-2">
                <h4 class="mb-2">Gêneros Musicais</h4>
                <a href="{{route('genres.create')}}" class="btn btn-outline-primary">Adicionar</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                        <tr>
                        <td scope="row">{{$genre->id}}</td>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a href="{{route('genres.edit', $genre->id)}}" class="btn btn-outline-success">Editar</a>
                                <button  class="btn btn-outline-danger" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                                <form method="post" id="destroy" action="{{route('genres.destroy', $genre->id)}}">
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