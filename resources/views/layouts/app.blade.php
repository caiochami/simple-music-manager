<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    
</head>
<body>
   
    @include('partials._navbar')
    
    @if (session('message'))
        <div class="alert {{session('alert-class')}}" role="alert">
            <h4 class="alert-heading"></h4>
            <p>{{ session('message') }}</p>
        </div>
    @endif
   
    <main role="main" id="app" class="container">
        <div class="starter-template p-1">
            @yield('content')
        </div>
    </main><!-- /.container -->

    <script>
        setTimeout(() => {
            $('.alert').fadeOut(400)            
        }, 3000);

        
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('custom_scripts')
  

    
</body>
</html>