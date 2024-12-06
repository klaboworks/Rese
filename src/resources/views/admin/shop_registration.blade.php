@extends('layouts.app')

@section('title', '店舗登録')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/shop_registration.css') }}">
@endsection

@section('content')
    <section class="shop_registration">
        <div class="shop_registration__inner">
            <h1 class="page_title">店舗登録</h1>
            <form action="{{ route('admin.shop.store') }}" method="post" enctype="multipart/form-data"
                class="shop_registration__form">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <table class="shop-creation-form__table">
                    <tr class="form__shop_name">
                        <th><label for="shop_name">店舗名</label></th>
                        <td>
                            <input type="text" name="shop_name" class="input__shop_name" value="{{ old('shop_name') }}">
                            @error('shop_name')
                                <small class="error_message">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr class="form__shop_description">
                        <th><label for="shop_description">店舗情報</label></th>
                        <td>
                            <textarea name="shop_description" id="" class="input__shop_description">{{ old('shop_description') }}</textarea>
                            @error('shop_description')
                                <small class="error_message">
                                    {{ $message }}
                                </small>
                            @enderror
                        </td>
                    </tr>
                    <tr class="form__shop_area_genre">
                        <th>エリア/ジャンル</th>
                        <td>
                            <select name="area_id" id="">
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                @endforeach
                            </select>
                            <select name="genre_id" id="">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="form__shop_image">
                        <th><label for="image">画像</label></th>
                        <td><input type="file" name="image"></td>
                    </tr>
                </table>
                <button class="btn__registration">店舗を登録する</button>
                <a href="{{ route('admin.shop.index') }}" class="btn__back">戻る</a>
            </form>
        </div>
    </section>
@endsection
