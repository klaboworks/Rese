@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_index.css') }}">
@endsection

@section('content')
    <section class="shop_index--heading">
        <div class="heading__top-bar">
            <div class="top-bar__inner">
                <div>
                    <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
                </div>
                <div>
                    <a href="{{ route('shop.index') }}">サイトトップへ</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button>ログアウト</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="heading__navbar">
            <div class="heading__admin-menu">
                <a href="{{ route('admin.shop.index') }}">店舗一覧</a>
                <a class="btn__admin-menu" href="{{ route('admin.shop.create') }}">店舗を登録する</a>
                @can('super-admin')
                    <a href="{{ route('admin.staff.index') }}">店舗責任者一覧</a>
                    <a class="btn__admin-menu" href="{{ route('admin.staff.registration') }}">店舗責任者を登録する</a>
                @endcan
            </div>

            <div class="headhing__shop-search">
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
                    <button>店舗検索</button>
                    @cannot('super-admin')
                        <button name='user_id' value=" {{ Auth::user()->id }}">担当店舗を表示する</button>
                    @endcan
                </form>
            </div>
        </div>
    </section>

    <section class="shop_index">
        <div class="shop_index__inner">
            <table class="shop_index__table">
                <thead class="table-header">
                    <tr class="table-row">
                        <th>ID</th>
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
                                    @php
                                        $image = $shop->shop_image;
                                    @endphp
                                    @if (str_starts_with($image, 'http'))
                                        <img src="{{ $shop->shop_image }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/' . $image) }}" alt="">
                                    @endif
                                </div>
                            </td>
                            <td class="td__setting">
                                @can('update', $shop)
                                    <div>
                                        <a href="{{ route('admin.shop.reservations', $shop->id) }}">
                                            <button class="btn__confirm_reservations">予約確認</button>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.shop.edit', $shop->id) }}">
                                            <button class="btn__update_shop">更新</button>
                                        </a>
                                    </div>
                                    <div>
                                        <form method="post" action="{{ route('admin.shop.destroy') }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn__delete_shop">削除</button>
                                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                        </form>
                                    </div>
                                @endcan
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
