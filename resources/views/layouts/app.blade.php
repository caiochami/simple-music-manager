<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        

       
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">        
        <script defer src="{{ asset('js/app.js') }}" ></script>   
    </head>
    <body>
       <div id="app">
        @yield('content')
       </div>
    </body>
</html>
