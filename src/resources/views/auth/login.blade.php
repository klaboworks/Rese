@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <section class="login">
        <div class="login__inner">
            <div class="login__heading">
                <x-menu />
            </div>
            <div class="login__body">
                <div class="login__panel">
                    <div class="panel__heading">
                        <h2 class="heading__ttl">Login</h2>
                    </div>
                    <div class="panel__body">
                        <form action="/login" method="post" class="login__form">
                            @csrf
                            <div class="input__elements">
                                <img src="{{ asset('icons/email.png') }}" alt="">
                                <input type="text" name="email" placeholder="Email" class="input__email">
                            </div>
                            <div class="input__elements">
                                <img src="{{ asset('icons/password.png') }}" alt="">
                                <input type="password" name="password" placeholder="Password" class="input__pass">
                            </div>
                            <button type="submit" class="login__btn">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
