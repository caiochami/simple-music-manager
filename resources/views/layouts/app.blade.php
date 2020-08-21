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
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        @include('partials._navbar')
        
        @if (session('message'))
            <div class="alert {{session('alert-class')}}" role="alert">
              <h4 class="alert-heading"></h4>
              <p>{{ session('message') }}</p>
            </div>
        @endif

  
    </div>
    <main role="main" class="container">

        <div class="starter-template p-1">
            @yield('content')
        </div>
  
    </main><!-- /.container -->

    <script>
        setTimeout(() => {
            $('.alert').fadeOut(400)            
        }, 3000);
    </script>
  

    
</body>
</html>
