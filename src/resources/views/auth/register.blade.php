@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/menu.js') }} " defer></script>
@endsection

@section('content')
    <section class="register">
        <div class="register__inner">
            <div class="register__heading">
                <x-menu />
            </div>
            <div class="register__body">
                <div class="register__panel">
                    <div class="panel__heading">
                        <h2 class="heading__ttl">register</h2>
                    </div>
                    <div class="panel__body">
                        <form action="/register" method="post" class="register__form">
                            @csrf
                            <div class="input__elements">
                                <img src="{{ asset('icons/user.png') }}" alt="">
                                <input type="text" name="name" placeholder="Username">
                            </div>
                            <div class="input__elements">
                                <img src="{{ asset('icons/email.png') }}" alt="">
                                <input type="text" name="email" placeholder="Email" class="input__email">
                            </div>
                            <div class="input__elements">
                                <img src="{{ asset('icons/password.png') }}" alt="">
                                <input type="text" name="password" placeholder="Password" class="input__pass">
                            </div>
                            <button type="submit" class="register__btn">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
