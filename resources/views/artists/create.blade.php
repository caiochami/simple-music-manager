@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h4 class="mb-2">Cadastrar artista</h4>
            <form action="{{route('artists.store')}}" 
            method="post">
                {{csrf_field()}}
                <div class="form-group ">
                    <label for="name" class="col-md-4 control-label">Nome</label>

                
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                    
                </div>
                <div class="form-group">
                    <a href="{{ route('artists.index')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection