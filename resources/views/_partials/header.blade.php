<div id="header">
    <a href="/home">
        <img id="logo" src={{asset('img/carsdy_extended.png')}}>
    </a>


    <a class="header_segment" id="create_card" href="/create_card">Create card</a>

    @auth
    <a class="header_segment" id="logout_but" href="/logout">Logout</a>
    @endauth

    @guest

    <div id="reg_log">
        <a class="header_segment" id="register_but" href="/register">Register</a>
        <a class="header_segment" id="login_but" href="/login">Log in</a>
    </div>
    @endguest
</div>
