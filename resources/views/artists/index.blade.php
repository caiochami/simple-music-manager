@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row justify-content-between mb-2">
                <h4 class="mb-2">Artistas</h4>
                <a href="{{route('artists.create')}}" class="btn btn-outline-primary">Adicionar</a>
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
                        @forelse($artists as $artist)
                        <tr>
                        <td scope="row">{{$artist->id}}</td>
                            <td>{{ $artist->name }}</td>
                            <td>
                                <a href="{{route('artists.edit', $artist->id)}}" class="btn btn-outline-success">Editar</a>
                                <button  class="btn btn-outline-danger" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                                <form method="post" id="destroy" action="{{route('artists.destroy', $artist->id)}}">
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