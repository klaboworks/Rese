@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_index.css') }}">
@endsection

@section('content')
    <p>店舗一覧</p>

    <a href="{{ route('admin.shop.create') }}">ショップを登録する</a>

    <section class="shop_index">
        <div class="shop-search">
            <form action="{{ route('admin.shop.search') }}" method="GET" class="shop-search__form">
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

        <div class="shop_index__inner">
            <table class="shop_index__table">
                <thead class="table-header">
                    <tr class="table-row">
                        <th>店舗ID</th>
                        <th>店舗名</th>
                        <th>エリア</th>
                        <th>ジャンル</th>
                        <th>店舗詳細</th>
                        <th>イメージ画像</th>
                        <th>更新/削除</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shops as $shop)
                        <tr class="table-row table-data">
                            <td class="td__id">
                                {{ $shop->id }}
                            </td>
                            <td class="td__shop_name">
                                {{ $shop->shop_name }}
                            </td>
                            <td class="td__area_name">
                                {{ $shop->area->area_name }}
                            </td>
                            <td class="td__genre_name">
                                {{ $shop->genre->genre_name }}
                            </td>
                            <td class="td__shop_description">
                                {{ $shop->shop_description }}
                            </td>
                            <td class="td__shop_image">
                                <div class="shop_image__image">
                                    <img src="{{ $shop->shop_image ? asset('storage/' . $shop->shop_image) : asset('storage/' . 'noimage.png') }}"
                                        alt="">
                                </div>
                            </td>
                            <td class="td__setting">
                                <button class="btn__update_shop">更新</button>
                                <button class="btn__delete_shop">削除</button>
                            </td>
                        </tr>
                    @empty
                        <p>店舗を登録してください</p>
                    @endforelse
                </tbody>
            </table>
            {{ $shops->appends(request()->query())->links() }}
        </div>
    </section>
@endsection
