@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <section class="shop-detail">
        <div class="shop-detail__inner">
            <div class="detail-block__left">
                <div class="menu">メニューボタン</div>
                <div class="shop-info">
                    <h2 class="shop_name">{{ $shop->shop_name }}</h2>
                    <div class="shop_image">
                        <img src="{{ $shop->shop_image ? asset('storage/' . $shop->shop_image) : asset('storage/' . 'noimage.png') }}"
                            alt="">
                    </div>
                    <div class="shop_tags">
                        <span class="shop_area">#{{ $shop->area_id }}</span>
                        <span class="shop_genre">#{{ $shop->genre_id }}</span>
                    </div>
                    <p class="shop_description">{{ $shop->shop_description }}</p>
                </div>
            </div>
            <div class="detail-block__right">
                <div class="reservation-panel">
                    <h3 class="form-title form-elements">予約</h3>
                    <form action="" method="post" class="shop-reservation">
                        <ul class="form-elements">
                            <li class="form__date">
                                <input type="date" name="date">
                            </li>
                            <li class="form__time full">
                                <input type="time" name="time" step="1800" class="full">
                            </li>
                            <li class="form__number full">
                                <input type="number" name="number" class="full">
                            </li>
                        </ul>
                        <button class="form-btn">予約する</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
