@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-md-6">
            
        <h4>Login</h4>
           
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group ">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                    
                </div>


                

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    
                </div>

                <div class="form-group">
                   
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                   
                </div>

                <div class="form-group">
                   
                        <button type="submit" class="btn btn-primary">
                            Entrar
                        </button>
                </div>
            </form>
    
        </div>
    </div>
</div>

@endsection
