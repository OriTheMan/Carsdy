<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Carsdy</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href={{ URL::asset('css/header.css') }}>
        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">

        @if(Request::path() === 'login')
            <link rel="stylesheet" type="text/css" href={{ URL::asset('css/login.css') }}>
        @elseif(Request::path()==='register')
            <link rel="stylesheet" type="text/css" href={{ URL::asset('css/register.css') }}>
        @endif
    </head>

    <body>  
        @include('_partials.header')

        @yield('content')
    </body>
</html>
