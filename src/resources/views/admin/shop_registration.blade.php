@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/shop_registration.css') }}">
@endsection

@section('content')
    <section class="shop_registration">
        <div class="shop_registration__inner">
            <form action="{{ route('admin.shop.store') }}" method="post" enctype="multipart/form-data"
                class="shop-creation-form">
                @csrf
                {{ Auth::user()->id }}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form__shop_name">
                    <label for="shop_name">店舗名</label>
                    <input type="text" name="shop_name" class="input__shop_name">
                </div>
                <div class="form__shop_description">
                    <label for="shop_description">店舗情報</label>
                    <textarea name="shop_description" id=""></textarea>
                </div>
                <div class="form__shop_area">
                    <select name="area_id" id="">
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__shop_genre">
                    <select name="genre_id" id="">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__shop_image">
                    <input type="file" name="image">
                </div>
                <button>店舗を登録する</button>
            </form>
        </div>
    </section>
@endsection
