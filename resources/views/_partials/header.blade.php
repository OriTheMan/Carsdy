<div id="header">
    <a href="/home">
        <img id="logo" src={{asset('img/carsdy_extended.png')}}>
    </a>


    <a class="header_segment" id="create_card" href="/create_set">Create card set</a>

    @auth
        <div class="right_segment">
            <a class="header_segment" id="profile_but" href="/user/{{ Auth::User()->id }}/card_sets" style="self-align:flex-end;"><i class="fas fa-user"></i></a>

            <a href="{{ route('logout') }}" class="header_segment" id="logout_but" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            Logout
            </a> 

            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    @endauth

    @guest
        <div class="right_segment">
            <a class="header_segment" id="register_but" href="/register">Register</a>
            <a class="header_segment" id="login_but" href="/login">Log in</a>
        </div>
    @endguest
</div>
