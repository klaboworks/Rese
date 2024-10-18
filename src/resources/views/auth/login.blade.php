@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <section class="login">
        <div class="login__inner">
            <div class="login__heading">
                <div>menu button</div>
            </div>
            <div class="login__body">
                <div class="login__panel">
                    <div class="panel__heading">
                        <h2 class="heading__ttl">Login</h2>
                    </div>
                    <div class="panel__body">
                        <form action="" class="login__form">
                            <input type="text" name="email" placeholder="Email" class="input__email">
                            <input type="password" name="password" placeholder="Password" class="input__pass">
                            <button type="submit" class="login__btn">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
