<style>
    .menu_box {
        width: 32px;
        height: 32px;
        border-radius: 4px;
        box-shadow: 2px 2px 4px #969696;

        >img {
            width: 100%;
            object-fit: cover;
        }
    }

    .site__menu {
        display: flex;
        align-items: center;
        gap: 16px;

        >h1 {
            font-size: 32px;
            color: #4553ff;
        }
    }
</style>

<div class="site__menu">
    <a href="/menu">
        <div class="menu_box">
            <img src="{{ asset('icons/menu_button.png') }}" alt="">
        </div>
    </a>
    <h1 class="site__ttl">Rese</h1>
</div>
