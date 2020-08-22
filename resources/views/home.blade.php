@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <div class="card my-2">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Bem vindo, {{auth()->user()->name}}</h4>
                        <p class="card-text">Detalhes da sua conta:</p>
                        <ul class="list-unstyled">
                        <li>
                            Data de nascimento: {{ auth()->user()->presentedBirthday->format('d/m/Y') }}</li>
                        <li>
                            Sexo: {{auth()->user()->presentedGender }}
                        </li>
                        <li>Email: {{ auth()->user()->email}}</li>
                        </ul>
                    
                        @if(auth()->user()->tracks->count())<h4>Minha faixas favoritas</h4>@endif

                        <div  class="card-columns">
                            @foreach(auth()->user()->tracks as $track)

                            <div class="card" onclick="window.location.href='{!! route('tracks.show', $track->id) !!}'">
                                
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $track->title}}</h5>
                                    <p class="card-text">{{ $track->album->title}}</p>
                                    <p class="card-text font-weight-bold">{{ $track->album->artist->name}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if(auth()->user()->albums->count())<h4>Meus Albuns favoritos</h4>@endif

                        <div  class="card-columns">
                            @foreach(auth()->user()->albums as $album)

                            <div class="card" onclick="window.location.href='{!! route('albums.show', $album->id) !!}'">
                                
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $album->title}}</h5>                                   
                                    <p class="card-text font-weight-bold">{{ $album->artist->name}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>


                </div>
            </div>

           
            
        </div>
</div>
@endsection
