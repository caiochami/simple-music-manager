@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-6 text-center">
        <h4 class="text-danger font-weight-bold mt-2">Whoops, Página não encontrada</h4>
        <br>
        <a href="{{route('welcome')}}" class="btn btn-outline-primary">Me tire daqui!</a>
    </div>
</div>
    
@endsection