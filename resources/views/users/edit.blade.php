@extends('layouts.app')

@section('content')
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h4 class="mb-2">Editando usuário: {{$user->name}}</h4>
            <form 
            action="{{route('users.update', $user->id)}}" 
            method="post">
                {{ method_field('PATCH') }}         
                {{csrf_field()}}
                <div class="form-group ">
                    <label for="name" class="col-md-4 control-label">Nome</label>

                
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                    
                </div>
                <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                    <label for="birthday" class="control-label">Data de nascimento</label>
                        <input id="birthday" type="date" 
                        class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                         name="birthday" value="{{ $user->birthday }}" required autofocus>

                        @if ($errors->has('birthday'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </div>
                        @endif
                </div>

                <div class="form-group ">
                    <label class="control-label" for="gender">Sexo</label>
                    
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        <option {{ $user->gender === 'male' ? 'selected' : '' }} value="male">Masculino</option>
                        <option {{ $user->gender === 'female' ? 'selected' : '' }} value="female">Feminino</option>
                        <option value="undefined">Não definido</option>
                    </select>
                    
                    @if ($errors->has('gender'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </div>
                @endif
                </div>                      

                <div class="form-group">
                    <label for="email" class="control-label">E-Mail</label>

                    
                        <input id="email" 
                        type="email" 
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                        name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                   
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Senha</label>

                   
                        <input id="password" 
                        type="password" 
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                        name="password" >

                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                   
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirmar Senha</label>

                   
                        <input id="password-confirm" type="password" class="form-control"
                         name="password_confirmation" 
                         >
                    
                </div>
                <div class="form-group">
                    <a href="{{ route('users.index')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-info">Modificar</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection