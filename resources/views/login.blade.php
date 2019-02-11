@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/login.css') }}>
@endpush
@section('content')

    <div id="container">
        <div id="color_box">
            <div id="div1"></div>
            <div id="div2"></div>
            <div id="div3"></div>
        </div>

        <div id="form_cont">
            <h1 id="login">Log in</h1>
            @if(session('message') == 'Failed')
                <h4 id="login_failed"><span class="fas fa-times error_icon"></span> Username or password is incorrect</h4>
            @endif
            <form action="/login" method="POST">
                @csrf

                <div class="field_cont">
                    <label for="username">Username</label>
                    <input class="char_field" type="text" id="username" name="username" />
                </div>

                <div class="field_cont">
                    <label for="password">Password</label>
                    <input class="char_field" type="password" id="password" name="password" />
                </div>

                <div class="field_cont">
                    <label for="remember_me">Remember me</label>
                    <input type="checkbox" name="remember_me"/>
                </div>

                <button id="log_but" type="submit">Log in</button>
            </form>

            <p id="call_to_reg">Don't have an account? Register <a href="/register">here</a></p>
        </div>
    </div>
@stop