@extends('layouts.app')

@section('title', 'お知らせメール一括送信')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/emails/news_form.css') }}">
@endsection

@section('content')
    <section class="news_form">
        <section class="news_form__inner">
            <h1 class="page_title">お知らせメール一括送信</h1>
            <form class="news_form__form" method="POST" action="{{ route('admin.email.confirm') }}">
                @csrf
                <div>
                    <p>件名：</p>
                    @error('subject')
                        <small class="error_message">
                            {{ $message }}
                        </small>
                    @enderror
                    <input type="text" name="subject" placeholder="件名を入力" value="{{ old('subject') }}">
                </div>
                <div>
                    <p>本文：</p>
                    @error('content')
                        <small class="error_message">
                            {{ $message }}
                        </small>
                    @enderror
                    <textarea name="content" placeholder="本文を入力">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn__to_confirm">確認画面へ</button>
            </form>
            <a href="{{ route('admin.get.users') }}" class="btn__back">戻る</a>
        </section>
    </section>
@endsection
