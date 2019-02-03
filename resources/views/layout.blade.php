<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Carsdy</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href={{ URL::asset('css/header.css') }}>
        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
        
        @if(Request::path() === 'login')
            <link rel="stylesheet" type="text/css" href={{ URL::asset('css/login.css') }}>
        @elseif(Request::path()==='register')
            <link rel="stylesheet" type="text/css" href={{ URL::asset('css/register.css') }}>
        @elseif(Request::path()==='create_set')
            <link rel="stylesheet" type="text/css" href={{ URL::asset('css/create_set.css') }}>
            <script type="text/javascript" src={{ URL::asset('js/create_set.js') }}></script>
        @endif
        
    </head>

    <body>  
        @include('_partials.header')

        @yield('content')
    </body>
</html>
