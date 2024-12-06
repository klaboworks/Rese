@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/shop_edit.css') }}">
@endsection

@section('content')
    <section class="shop_edit">
        <section class="shop_edit__inner">
            <h1 class="page_title">店舗情報更新</h1>
            <form action="{{ route('admin.shop.update') }}" method="post" class="shop_edit__form">
                @csrf
                @method('patch')
                <div>
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <label for="shop_name">店名：</label>
                    <input type="text" name="shop_name" value="{{ $shop->shop_name }}">
                </div>
                <div>
                    <label for="area_id">エリア：</label>
                    <select name="area_id">
                        <option value="{{ $shop->area->area_id }}" selected disabled>{{ $shop->area->area_name }}
                        </option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="genre_id">ジャンル：</label>
                    <select name="genre_id">
                        <option value="{{ $shop->genre->genre_id }}" selected disabled>{{ $shop->genre->genre_name }}
                        </option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="shop_description">詳細：</label>
                    <textarea name="shop_description" cols="30" rows="10" class="shop_description">
                        {{ $shop->shop_description }}
                    </textarea>
                </div>
                <button class="btn__update">更新</button>
                <a class="btn__back" onclick="history.back()">戻る</a>
            </form>
        </section>
    </section>
@endsection
