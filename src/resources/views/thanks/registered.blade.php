@extends('layouts.app')

@section('title', 'registerd')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <section class="registered">
        <div class="registered__inner">
            <x-menu />
            <div class="registered__panel">
                <h2 class="pannel__heading-text">会員登録ありがとうございます</h2>
                <a href="{{ route('shop.index') }}" class="gotop__btn">ログインする</a>
            </div>
        </div>
    </section>
@endsection
