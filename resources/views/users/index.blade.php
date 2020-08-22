@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
                <h4 class="mb-2">Usuários</h4>
                <a href="{{route('users.create')}}" class="btn btn-outline-primary">Adicionar</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Sexo</th>
                            <th>Data de nascimento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                        <td scope="row">{{$user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->presentedGender }}</td>
                            <td>{{ $user->presentedBirthday->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-success">Editar</a>
                                <button  class="btn btn-outline-danger" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                                <form method="post" id="destroy" action="{{route('users.destroy', $user->id)}}">
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