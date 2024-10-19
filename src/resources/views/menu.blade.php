<style>
    :root {
        --shadow: #969696;
        --blue: #4553ff;
    }

    .menu__inner {
        max-width: 1440px;
        width: calc(100% - 80px);
        padding: 40px 0;
        margin: 0 auto;
    }

    .menu__list_field {
        text-align: center;
        padding-top: 10vh;

        .list__item {
            padding: 16px;
            list-style: none;

            >a {
                font-size: 24px;
                text-decoration: none;
                color: var(--blue);
            }

            >form>button {
                font-size: 24px;
                border: none;
                background: none;
                color: var(--blue);
                cursor: pointer;
            }
        }
    }

    .menu_box {
        width: 32px;
        height: 32px;
        border-radius: 4px;
        box-shadow: 2px 2px 4px var(--shadow);

        >img {
            width: 100%;
            object-fit: cover;
        }
    }
</style>

<section class="menu">
    <div class="menu__inner">
        <a href="{{ route('shop.index') }}">
            <div class="menu_box"><img src="{{ asset('icons/menu_button_close.png') }}" alt=""></div>
        </a>

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
                    <li class="list__item"><a href="/">Mypage</a></li>
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
