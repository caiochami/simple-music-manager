@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h4 class="mb-2">Editnado album: {{ $album->title }} </h4>
            <form action="{{route('albums.update', $album->id)}}" 
            method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}       
                <div class="form-group ">
                    <label for="artist" class="col-md-4 control-label">Artista</label>
                
                   
                    <div class="form-group">
                      <label for="artist"></label>
                      <select class="form-control {{ $errors->has('artist') ? 'is-invalid' : '' }}" name="artist" id="artist">
                        @foreach($artists as $artist)
                            <option 
                            {{ $album->artist->id === $artist->id ? 'selected' : '' }} 
                            value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    @if ($errors->has('artist'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('artist') }}</strong>
                        </div>
                    @endif

                </div>
                <div class="form-group ">
                    <label for="title" class="col-md-4 control-label">Título</label>

                
                    <input id="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ $album->title }}" required autofocus>

                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </div>
                    @endif
                    
                </div>
                <div class="form-group ">
                    <label for="year" class="col-md-4 control-label">Ano</label>

                
                    <input id="year" type="number" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year" value="{{ $album->year }}" required autofocus>

                    @if ($errors->has('year'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('year') }}</strong>
                        </div>
                    @endif
                    
                </div>
                <div class="form-group">
                    <a href="{{ route('albums.show', $album->id)}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection