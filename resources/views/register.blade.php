@extends('layout')
@section('content')
<form action="/login" method="POST">
    @csrf

    <div id="container">
        <div id="color_box">
            <div id="div1"></div>
            <div id="div2"></div>
            <div id="div3"></div>
        </div>

        <div id="form_cont">
        <h1 id="register">Register</h1>
            <form action="/register" method="POST">

                <div class="field_cont">
                    <label for="cnf_email">E-mail</label>
                    <input class="char_field" type="password" id="password" name="password" />
                </div>

                <div class="field_cont">
                    <label for="username">Username</label>
                    <input class="char_field" type="text" id="username" name="username" />
                </div>

                <div class="field_cont">
                    <label for="password">Password</label>
                    <input class="char_field" type="password" id="password" name="password" />
                </div>

                <div class="field_cont">
                    <label for="cnf_password">Confirm Password</label>
                    <input class="char_field" type="password" id="password" name="password" />
                </div>


                <button id="reg_but" type="submit">Register</button>
            </form>

            <p id="call_to_login">Already have an account? Log in <a href="/login">here</a></p>

        </div>
    </div>

</form>

@stop