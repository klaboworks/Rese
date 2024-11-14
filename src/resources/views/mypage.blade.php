@extends('layouts.app')

@section('title', 'mypage')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/menu.js') }} " defer></script>
<script src="{{ asset('js/mypage.js') }} " defer></script>
<script src="{{ asset('js/reservation.js') }} " defer></script>
@endsection

@section('content')
<section class="mypage">
    <div class="mypage__inner">
        @if (session('message'))
        <div class="message">
            {{ session('message') }}
        </div>
        @endif
        <div class="mypage__heading">
            <x-menu />
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
                            <p>予約 <span class="reservation_number"></span></p>
                            <div class="change_buttons">
                                <button class="update_btn">変更</button>
                                <button class="cancel_btn">キャンセル</button>
                            </div>
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
                                    <td>{{ (new Carbon\Carbon($reserved_shop->pivot->time))->format('H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>{{ $reserved_shop->pivot->number }}人</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- 予約変更パネル --}}
                    <div class="reservation__field--update reservation_update_hidden">
                        <div class="reservation__panel--update">
                            <div class="panel__heading--update">
                                <p>予約を変更しますか？</p>
                            </div>
                            <form action="/mypage" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" value="{{ $reserved_shop->pivot->id }}">
                                <table class="panel__body--update">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $reserved_shop->shop_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td>
                                                <input type="date" name="date" id="datepicker2" min=""
                                                    class="select_date" value="{{ $reserved_shop->pivot->date }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>
                                                <select type="time" name="time" class="select_time full">
                                                    <option value="{{ $reserved_shop->pivot->time }}" selected>
                                                        {{ (new Carbon\Carbon($reserved_shop->pivot->time))->format('H:i') }}
                                                    </option>
                                                    <option value="17:00"
                                                        @if (old('time')=='17:00' ) selected @endif>17:00
                                                    </option>
                                                    <option value="17:30"
                                                        @if (old('time')=='17:30' ) selected @endif>17:30
                                                    </option>
                                                    <option value="18:00"
                                                        @if (old('time')=='18:00' ) selected @endif>18:00
                                                    </option>
                                                    <option value="18:30"
                                                        @if (old('time')=='18:30' ) selected @endif>18:30
                                                    </option>
                                                    <option value="19:00"
                                                        @if (old('time')=='19:00' ) selected @endif>19:00
                                                    </option>
                                                    <option value="19:30"
                                                        @if (old('time')=='19:30' ) selected @endif>19:30
                                                    </option>
                                                    <option value="20:00"
                                                        @if (old('time')=='20:00' ) selected @endif>20:00
                                                    </option>
                                                    <option value="20:30"
                                                        @if (old('time')=='20:30' ) selected @endif>20:30
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>
                                                <select type="number" name="number" class="select_number full">
                                                    <option value="{{ $reserved_shop->pivot->number }}" selected>
                                                        {{ $reserved_shop->pivot->number }}人
                                                    </option>
                                                    <option value="1"
                                                        @if (old('number')=='1' ) selected @endif>1人
                                                    </option>
                                                    <option value="2"
                                                        @if (old('number')=='2' ) selected @endif>2人
                                                    </option>
                                                    <option value="3"
                                                        @if (old('number')=='3' ) selected @endif>3人
                                                    </option>
                                                    <option value="4"
                                                        @if (old('number')=='4' ) selected @endif>4人
                                                    </option>
                                                    <option value="5"
                                                        @if (old('number')=='5' ) selected @endif>5人以上
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="update-commit__btn">予約を変更する</button>
                                <div class="update_cancel">
                                    <p>変更せず戻る</p>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- 予約キャンセルパネル --}}
                    <div class="reservation__field--cancel reservation_cancel_hidden">
                        <div class="reservation__panel--cancel">
                            <div class="panel__heading--cancel">
                                <p>予約をキャンセルしますか？</p>
                            </div>
                            <form action="/mypage" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $reserved_shop->pivot->id }}">
                                <table class="panel__body--cancel">
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
                                            <td>{{ (new Carbon\Carbon($reserved_shop->pivot->time))->format('H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>{{ $reserved_shop->pivot->number }}人</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="cancel-commit__btn">予約をキャンセルする</button>
                                <div class="cancel_cancel">
                                    <p>キャンセルせず戻る</p>
                                </div>
                            </form>
                        </div>
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