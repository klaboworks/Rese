@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/menu.js') }} " defer></script>
@endsection

@section('title', '飲食店一覧')

@section('content')
    @canany(['admin'])
        <div class="admin_menu">
            <div class="admin_menu__inner">
                <div>
                    {{ Auth::user()->name }}さんお疲れ様です！
                </div>
                <div class="admin_menu_link">
                    <a href="{{ route('admin.shop.index') }}">管理画面へ</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button>ログアウト</button>
                    </form>
                </div>
            </div>
        </div>
    @endcanany
    <section class="index">
        <div class="index__inner">

            @if (Auth::check())
                <p>{{ Auth::user()->name }}さんログイン中</p>
            @endif

            <div class="index__heading">
                <x-menu />
                <div class="shop-search">
                    <form action="{{ route('shop.search') }}" method="GET" class="shop-search__form">
                        <select name="shop_area" id="" class="form-element__shop_area">
                            <option value="" selected>All area</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                        <select name="shop_genre" id="" class="form-element__shop_genre">
                            <option value="" selected>All genre</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name='shop_name' placeholder="Search..." class="form-element__shop_name">
                    </form>
                </div>
            </div>
            <div class="index__body">
                <div class="shop-cards__field">
                    @forelse ($shops as $shop)
                        <div class="shop-cards__item">
                            <div class="shop-card__head">
                                <img src="{{ $shop->shop_image }}" alt="">
                            </div>
                            <div class="shop-card__body">
                                <h2 class="shop_name">{{ $shop->shop_name }}</h2>
                                <div class="shop_tags">
                                    <span class="shop_area">#{{ $shop->area->area_name }}</span>
                                    <span class="shop_genre">#{{ $shop->genre->genre_name }}</span>
                                </div>
                                <div class="buttons">
                                    <a href="/detail/{{ $shop->id }}" class="shop_detail">詳しく見る</a>
                                    <form action="{{ route('shop.fav') }}" method="post">
                                        @csrf
                                        @if (Auth::check())
                                            <input type="hidden" name='user_id' value="{{ Auth::user()->id }}">
                                            <input type="hidden" name='shop_id' value="{{ $shop->id }}">
                                            <button class="fav_btn"><img
                                                    src="{{ $shop->hasFavorite(Auth::user()->id) ? asset('icons/fav_active.png') : asset('icons/fav_disabled.png') }}"
                                                    alt=""></button>
                                        @else
                                            <button class="fav_btn"><img src="{{ asset('icons/fav_disabled.png') }}"
                                                    alt=""></button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="no_result">
                            <p class="no_result__text">店舗がありません</p>
                            <a href="{{ route('shop.index') }}">Go to top</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
