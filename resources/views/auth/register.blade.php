@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            
                
            <h3>Registrar</h3>

                
            <form class="form-horizontal" 
            method="POST" 
            action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Nome</label>

                   
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    
                </div>

                <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                    <label for="birthday" class="control-label">Data de nascimento</label>

                   
                        <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required autofocus>

                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                        @endif
                    
                </div>

                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label class="control-label" for="gender">Sexo</label>
                    
                    <select class="form-control" name="gender" id="gender">
                        <option value="male">Masculino</option>
                        <option value="female">Feminino</option>
                        <option value="undefined">Não definido</option>
                    </select>
                    
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>                      

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail</label>

                    
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                   
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Senha</label>

                   
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                   
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirmar Senha</label>

                   
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    
                </div>

                <div class="form-group">
                    
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    
                </div>
            </form>
                
            
        </div>
    </div>

@endsection
