@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title', '{{ $shop->shop_name }}')

@section('content')
    <section class="shop-detail">
        <div class="shop-detail__inner">
            <div class="detail-block__left">
                <div class="btn-menu"><x-menu-box /></div>
                <div class="shop-info">
                    <div class="shop-info__heading">
                        <a href="{{ route('shop.index') }}" class="btn-back">&lt</a>
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
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <ul class="form-elements">
                            <li class="form__date">
                                <input type="date" name="date">
                            </li>
                            <li class="form__time full">
                                <select type="time" name="time" class="full">
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
                                <select type="number" name="number" class="full">
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
                    <div class="reservations">
                        @php
                            $reservations = Auth::user()->getReservation();
                        @endphp
                        @foreach ($reservations as $reservation)
                            <p class="reservation_shop">
                                {{ $reservation->shop_id ?? '' }}
                            </p>
                            <p class="reservation_date">
                                {{ $reservation->date ?? '' }}
                            </p>
                            <p class="reservation_time">
                                {{ $reservation->time ?? '' }}
                            </p>
                            <p class="reservation_number">
                                {{ $reservation->number . '人' ?? '' }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
