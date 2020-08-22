@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h4 class="mb-2">Editando faixa: {{$track->name}} </h4>
            <form action="{{route('tracks.update', $track->id)}}" 
            method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }} 
                   
                <div class="form-group">
                    <label class="col-md-4" for="artist">Artista</label>
                    <select v-model="artist" @change="getAlbums"  class="form-control" name="artist" id="artist">
                        <option value="">Selecionar</option>
                        <option 
                        v-for="artist in artists"
                        :key="artist.id"
                        :value="artist.id">@{{artist.name}}</option>                
                    </select>
                   
                    <div class="invalid-feedback">
                        <strong>error message</strong>
                    </div>
                   
                </div>   
                
                <div class="form-group" >
                    <label class="col-md-4" for="album">Albuns</label>
                    <select v-model="album" class="form-control" name="album" id="album" v-if="albums.length">
                        <option value="">Selecionar</option>
                        <option 
                        v-for="album in albums"
                        :key="album.id"
                        :value="album.id">@{{album.title}}</option>
                  
                    </select>
                    <div class="text-center text-secondary font-weight-bold" v-else>
                        <span>Albums not loaded</span>
                    </div>
                    
                    <div class="invalid-feedback">
                        <strong>error message</strong>
                    </div>
                   
                </div>   
                <div class="form-group">
                    <label class="col-md-4" for="genre">Gênero musical</label>
                    <select class="form-control {{ $errors->has('genre') ? 'is-invalid' : '' }}" name="genre" id="genre">
                    @foreach($genres as $genre)
                        <option 
                        {{ $track->genre_id === $genre->id ? 'selected' : '' }} 
                        value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                    </select>
                    

                    @if ($errors->has('genre'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('genre') }}</strong>
                        </div>
                    @endif

                </div>

                <div class="form-group ">
                    <label for="title" class="col-md-4 control-label">Título</label>
                
                    <input id="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ $track->title }}" required autofocus>

                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </div>
                    @endif
                    
                </div>

                <div class="form-group ">
                    <label for="number" class="col-md-4 control-label">Número da faixa</label>

                
                    <input id="number" type="number" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number" value="{{ $track->number }}" required autofocus>

                    @if ($errors->has('number'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('number') }}</strong>
                        </div>
                    @endif
                    
                </div>
                
                <div class="form-group">
                    <a href="{{ route('tracks.index')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('custom_scripts')

<script>
    new Vue({
        el: '#app',
        data: () => ({
            artists: {!! json_encode($artists) !!},
            artist: {{$track->album->artist->id}},
            errors: {!! json_encode($errors->all()) !!},
            albums: [],
            album: {{$track->album->id}}
        }),
        computed:{
            
        },
        created(){
            this.getAlbums();
        },
        methods: {
            getAlbums(){
                axios.get('/albums', { params: { artist: this.artist}})
                .then(({data}) => {
                    this.albums = data
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    })
</script>
    
@endsection