@extends('layouts.app')

@section('title', 'ユーザー一覧')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users_index.css') }}">
@endsection

@section('content')
    <section class="users__headhing">
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
            <h1>ユーザー一覧<span>（合計{{ $userCount }}人）</span></h1>
            <a class="btn__admin-menu" href="{{ route('admin.email.form') }}">お知らせメール一括送信</a>
            <a href="{{ route('admin.shop.index') }}">戻る</a>
        </div>
    </section>


    <section class="users__content">
        <div class="users__inner">
            <table class="users__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
