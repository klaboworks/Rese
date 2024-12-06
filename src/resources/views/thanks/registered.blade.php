@extends('layouts.app')

@section('title', 'ご登録完了')

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
                <p>ご登録いただいたメールアドレスにメールをお送りしておりますので、ご確認ください。</p>
                <p>メール認証を完了いただきますとすべての機能をご利用いただけます。</p>
                <a href="{{ route('shop.index') }}" class="gotop__btn">ログインする</a>
            </div>
        </div>
    </section>
@endsection
