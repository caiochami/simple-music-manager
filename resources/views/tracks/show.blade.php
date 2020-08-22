@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="row justify-content-between mb-2">
               <h4 class="mb-2">Exibindo faixa: {{$track->title}}</h4>
               <div>
                    <button 
                    class="btn btn-outline-primary"
                    :class="likedByUser ? 'btn-outline-secondary' : 'btn-outline-primary'"
                    @click="like()">@{{statusDesc}}</button>
                    <a href="{{route('tracks.edit', $track->id)}}" class="btn btn-outline-success">Editar</a>
                    <button  class="btn btn-outline-danger" onclick="document.querySelector('#destroy').submit()" >Remover</button>
                    <form method="post" id="destroy" action="{{route('tracks.destroy', $track->id)}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form>
               </div>
            </div>
            <div class="col-12 col-md-6 mt-2">
                <h5>Detalhes</h5>
                <ul>
                    <li>Artista: {{ $track->album->artist->name}}</li>
                    <li>Album: {{ $track->album->title}}</li>
                    <li>Número da faixa: {{ $track->number }}</li>
                    <li>Gênero: {{ $track->genre ? $track->genre->name : '...' }}</li>
                </ul>
                <h5>Usuários que curtiram: </h5>
                <ul>
                    @forelse($track->users as $user)
                    <li>{{ $user->name }}</li>
                    @empty
                    <li>Nenhuma curtida registrada</li>
                    @endforelse
                </ul>
                <p>Total: {{$track->users->count()}}</p>
            </div>
          
        </div>
       
    </div>
@endsection

@section('custom_scripts')
<script>
new Vue({
    el: '#app',
    data: () => ({
        track: {!! json_encode($track) !!},
        likedByUser: {{ $track->likedByUser() }}
    }),
    computed:{
        statusDesc: function(){
            return this.likedByUser ? 'Descurtir' : 'Curtir'
        }
    },
    methods: {
        like(){
            axios.put(`/tracks/${this.track.id}/like`)
            .then(({data}) => {
                this.likedByUser = data
            })
        }
    }  
}) 
</script>   
@endsection