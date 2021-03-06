@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
               <h4 class="mb-2">Exbindo album: {{$album->title}}</h4>
               <div>
                    <button 
                    class="btn btn-outline-primary"
                    :class="likedByUser ? 'btn-outline-secondary' : 'btn-outline-primary'"
                    @click="like()">@{{statusDesc}}</button>
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

@section('custom_scripts')
<script>
new Vue({
    el: '#app',
    data: () => ({
        album: {!! json_encode($album) !!},
        likedByUser: {{ $album->likedByUser() }}
    }),
    computed:{
        statusDesc: function(){
            return this.likedByUser ? 'Descurtir' : 'Curtir'
        }
    },
    methods: {
        like(){
            axios.put(`/albums/${this.album.id}/like`)
            .then(({data}) => {
                this.likedByUser = data
            })
        }
    }  
}) 
</script>   
@endsection