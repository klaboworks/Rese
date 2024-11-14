@extends('layouts.app')

@section('title', '店舗責任者一覧')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managers.css') }}">
@endsection

@section('content')
    <section class="managers__headhing">
        <div class="heading__top-bar">
            <div class="top-bar__inner">
                <div>
                    <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
                </div>
                <div>
                    <a href="{{ route('admin.shop.index') }}">管理トップへ</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button>ログアウト</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="nav">
            <h1>店舗責任者一覧</h1>
            <a class="btn__admin-menu" href="{{ route('admin.staff.registration') }}"><button>店舗責任者を登録する</button></a>
        </div>
    </section>

    <section class="managers__content">
        <div class="managers__inner">
            <table class="managers__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="name">名前</th>
                        <th>担当店舗</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $staff->id }}</td>
                            <td>{{ $staff->name }}</td>
                            <td class="shops">
                                @foreach ($staff->shops as $shop)
                                    <p>{{ $shop->shop_name }}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
