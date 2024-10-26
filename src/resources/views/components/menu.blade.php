<div class="site__menu">
    <div class="menu_box">
        <img src="{{ asset('icons/menu_button.png') }}" alt="">
    </div>
    <h1 class="site__ttl">Rese</h1>
</div>

<section class="menu_panel menu_panel_hidden">
    <div class="menu__inner">
        <div class="menu_box"><img src="{{ asset('icons/menu_button_close.png') }}" alt=""></div>

        @if (Auth::check())
            <div class="menu__list_field">
                <ul class="menu__list">
                    <li class="list__item"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li class="list__item">
                        <form action="/logout" method="post">
                            @csrf
                            <button> Logout </button>
                        </form>
                    </li>
                    <li class="list__item"><a href="{{ route('user.mypage') }}">Mypage</a></li>
                </ul>
            </div>
        @else
            <div class="menu__list_field">
                <ul class="menu__list">
                    <li class="list__item"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li class="list__item"><a href="/register">Registration</a></li>
                    <li class="list__item"><a href="/login">Login</a></li>
                </ul>
            </div>
        @endif
    </div>
</section>
