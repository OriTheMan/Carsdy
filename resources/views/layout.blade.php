<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href={{ URL::asset('css/carsdy.css') }}>
        <title>Carsdy</title>
    </head>

    <body>
        <div id="header">
            <a href="/home">
                <img id="logo" src={{asset('img/carsdy_extended.png')}}>
            </a>

            @auth
            <a class="header_segment" id="create_card" href="/create_card">Create card</a>
            <a class="header_segment" id="out" href="/logout">Logout</a>
            @endauth

            @guest
            <a class="header_segment" id="create_card" href="/login">Create card</a>
            <a class="header_segment" id="login" href="/login">Login</a>
            @endguest
        </div>

        @yield('content')
    </body>
</html>
