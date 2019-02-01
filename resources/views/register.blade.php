@extends('layout')
@section('content')

    <div id="container">
        <div id="color_box">
            <div id="div1"></div>
            <div id="div2"></div>
            <div id="div3"></div>
        </div>

        <div id="form_cont">
            <h1 id="register">Register</h1>
            <form action="/register" method="POST">
                @csrf

                <div class="field_cont">
                    <label for="email">E-mail</label>
                    <input class="char_field" type="text" name="email" />
                    @if ($errors->has('email'))
                        <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="field_cont">
                    <label for="username">Username</label>
                    <input class="char_field" type="text" id="username" name="username" />
                    @if ($errors->has('username'))
                        <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('username') }}</div>
                    @endif
                </div>

                <div class="field_cont">
                    <label for="password">Password</label>
                    <input class="char_field" type="password" id="password" name="password" />
                    @if ($errors->has('password'))
                        <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="field_cont">
                    <label for="cnf_password">Confirm Password</label>
                    <input class="char_field" type="password" name="password_confirmation" />
                </div>


                <button id="reg_but" type="submit">Register</button>
            </form>

            <p id="call_to_login">Already have an account? Log in <a href="/login">here</a></p>

        </div>
    </div>
@stop