@extends('layouts.app')

@section('title', 'reserved')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <section class="reserved">
        <div class="reserved__inner">
            <x-menu-box />
            <div class="reserved__panel">
                <h2 class="pannel__heading-text">ご予約ありがとうございます</h2>
                <a href="{{ route('user.mypage') }}" class="back__btn">戻る</a>
            </div>
    </section>
@endsection
