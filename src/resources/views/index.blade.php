@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<section class="index">
    <div class="index__inner">
        <div class="index__heading">
            <div>ボタン入れる</div>
            <div class="shop-search">
                <form action="" class="shop-search__form">
                    <select name="select__shop_area" id="" class="form-element__shop_area">
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->area_name}}</option>
                        @endforeach
                    </select>
                    <select name="select__shop_genre" id="" class="form-element__shop_genre">
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                        @endforeach
                    </select>
                    <input type="text" placeholder="Search..." class="form-element__shop_name">
                </form>
            </div>
        </div>
        <div class="index__body">
            <div class="shop-cards__field">
                @foreach($shops as $shop)
                <div class="shop-cards__item">
                    <div class="shop-card__head">
                        <img src="{{ $shop->shop_image ? asset('storage/' .$shop->shop_image) :  asset('storage/' .'noimage.png')}}" alt="">
                    </div>
                    <div class="shop-card__body">
                        <h2 class="shop_name">{{$shop->shop_name}}</h2>
                        <div class="shop_tags">
                            <span class="shop_area">#{{$shop->area->area_name}}</span>
                            <span class="shop_genre">#{{$shop->genre->genre_name}}</span>
                        </div>
                        <a href="" class="shop_detail">詳しく見る</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection