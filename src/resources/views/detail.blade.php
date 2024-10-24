@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection
<script src="{{ asset('js/reservation.js') }}" defer></script>

@section('title', '{{ $shop->shop_name }}')

@section('content')
    <section class="shop-detail">
        <div class="shop-detail__inner">
            <div class="detail-block__left">
                <div class="btn-menu"><x-menu /></div>
                <div class="shop-info">
                    <div class="shop-info__heading">
                        <input type="button" onclick="history.back()" value="&lt" class="btn-back">
                        <h2 class="shop_name">{{ $shop->shop_name }}</h2>
                    </div>
                    <div class="shop_image">
                        <img src="{{ $shop->shop_image }}" alt="">
                    </div>
                    <div class="shop_tags">
                        <span class="shop_area">#{{ $shop->area->area_name }}</span>
                        <span class="shop_genre">#{{ $shop->genre->genre_name }}</span>
                    </div>
                    <p class="shop_description">{{ $shop->shop_description }}</p>
                </div>
            </div>
            <div class="detail-block__right">
                <div class="reservation-panel">
                    <h3 class="form-title form-elements">予約</h3>
                    <form action="" method="post" class="shop-reservation">
                        @csrf
                        @if (Auth::check())
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <ul class="form-elements">
                            <li class="form__date">
                                <input type="date" name="date" class="select_date">
                            </li>
                            <li class="form__time full">
                                <select type="time" name="time" class="select_time full">
                                    <option value="" selected disabled>時間を選択してください</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                </select>
                            </li>
                            <li class="form__number full">
                                <select type="number" name="number" class="select_number full">
                                    <option value="" selected disabled>人数を選択してください</option>
                                    <option value="1">1人</option>
                                    <option value="2">2人</option>
                                    <option value="3">3人</option>
                                    <option value="4">4人</option>
                                    <option value="5">5人以上</option>
                                </select>
                            </li>
                        </ul>
                        <button class="form-btn">予約する</button>
                    </form>
                    <div class="reservation_confirm">
                        <table class="reserbations_table">
                            <tbody>
                                <tr>
                                    <th>Shop</th>
                                    <td>{{ $shop->shop_name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td class="reserved_date"></td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td class="reserved_time"></td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td class="reserved_number"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
