@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_index.css') }}">
@endsection

@section('content')
    <p>店舗一覧</p>

    <a href="/admin/shop/create">ショップを登録する</a>

    <section class="shop_index">
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shops as $shop)
                        <tr class="table-row table-data">
                            <td>
                                {{ $shop->id }}
                            </td>
                            <td>
                                {{ $shop->shop_name }}
                            </td>
                            <td>
                                {{ $shop->area->area_name }}
                            </td>
                            <td>
                                {{ $shop->genre->genre_name }}
                            </td>
                            <td class="shop_description">
                                {{ $shop->shop_description }}
                            </td>
                            <td>
                                {{ $shop->shop_image }}
                            </td>
                        </tr>
                        @empty
                            <p>店舗を登録してください</p>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </section>
    @endsection
