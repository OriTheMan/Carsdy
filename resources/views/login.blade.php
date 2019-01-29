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
        <h1 id="login">Log in</h1>
            <form action="/login" method="POST">
                <div class="field_cont">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" />
                </div>

                <div class="field_cont">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" />
                </div>

                <button id="log_but" type="submit">Log in</button>
            </form>

            <p id="call_to_reg">Don't have an account? Register <a href="/register">here</a></p>

        </div>
    </div>

</form>

@stop