@extends('layouts.app')

@section('title', 'mypage')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <section class="mypage">
        <div class="mypage__inner">
            <div class="mypage__heading">
                <x-menu-box />
            </div>
            <div class="mypage__user_name">
                <h2 class="user_name__text">
                    {{ Auth::user()->name }}さん
                </h2>
            </div>
            <div class="mypage__body">
                <div class="mypage-block__left">
                    <h3 class="left__ttl">予約状況</h3>
                    <div class="reservation__field">
                        @php
                            $reserved_shops = Auth::user()->getReservedShop;
                        @endphp
                        @forelse ($reserved_shops as $reserved_shop)
                            <div class="reservation__panel">
                                <div class="panel__heading">
                                    <img src="icons/clock.png" alt="">
                                    <p>予約</p>
                                    <button>?</button>
                                </div>
                                <table class="panel__body">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $reserved_shop->shop_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>{{ $reserved_shop->pivot->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>{{ $reserved_shop->pivot->time }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>{{ $reserved_shop->pivot->number }}人</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @empty
                            <p class="no_reserve">
                                予約はありません
                            </p>
                        @endforelse
                    </div>
                </div>
                <div class="mypage-block__right">
                    <h3 class="right__ttl">お気に入り店舗</h3>
                    <div class="shop-cards__field">
                        @php
                            $favorite_shops = Auth::user()->getFavoriteShop;
                        @endphp
                        @forelse ($favorite_shops as $favorite_shop)
                            <div class="shop-cards__item">
                                <div class="shop-card__head">
                                    <img src="{{ $favorite_shop->shop_image }}" alt="">
                                </div>
                                <div class="shop-card__body">
                                    <h2 class="shop_name">{{ $favorite_shop->shop_name }}</h2>
                                    <div class="shop_tags">
                                        <span class="shop_area">#{{ $favorite_shop->area->area_name }}</span>
                                        <span class="shop_genre">#{{ $favorite_shop->genre->genre_name }}</span>
                                    </div>
                                    <div class="buttons">
                                        <a href="/detail/{{ $favorite_shop->id }}" class="shop_detail">詳しく見る</a>
                                        <form action="{{ route('shop.fav') }}" method="post">
                                            @csrf
                                            <input type="hidden" name='user_id' value="{{ Auth::user()->id }}">
                                            <input type="hidden" name='shop_id' value="{{ $favorite_shop->id }}">
                                            <button class="fav_btn"><img
                                                    src="{{ $favorite_shop->hasFavorite(Auth::user()->id) ? asset('icons/fav_active.png') : asset('icons/fav_disabled.png') }}"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="no_result">
                                <p class="no_result__text">お気に入りの店舗がありません</p>
                                <a href="{{ route('shop.index') }}">店舗を探しに行く</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
