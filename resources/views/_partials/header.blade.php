<div id="header">
    <a href="/home">
        <img id="logo" src={{asset('img/carsdy_extended.png')}}>
    </a>


    <a class="header_segment" id="create_card" href="/create_set">Create card</a>

    @auth
        <a href="{{ route('logout') }}" class="header_segment" id="logout_but" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        Logout
        </a> 

        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth

    @guest
        <div id="reg_log">
            <a class="header_segment" id="register_but" href="/register">Register</a>
            <a class="header_segment" id="login_but" href="/login">Log in</a>
        </div>
    @endguest
</div>
