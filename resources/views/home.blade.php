@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            <div class="card mt-2">
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
                </div>
            </div>
            
        </div>
</div>
@endsection
