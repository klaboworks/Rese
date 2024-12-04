@extends('layouts.app')

@section('title', 'お知らせメール一括送信')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/emails/news_form_confirm.css') }}">
@endsection

@section('content')
    <section class="news_form_confirm">
        <section class="news_form_confirm__inner">
            <h1 class="page_title">確認画面</h1>
            <form method="POST" action="{{ route('admin.email.send') }}" class="news_form_confirm__form">
                @csrf
                <div>
                    <p>件名：</p>
                    <p class="title_text">{{ $subject }}</p>
                    <input type="hidden" name="subject" value="{{ $subject }}">
                </div>
                <div>
                    <p>本文：</p>
                    <p class="body_text">{{ $content }}</p>
                    <input type="hidden" name="content" value="{{ $content }}">
                </div>
                <button type="submit" class="btn__submit">送信</button>
                <button type="submit" name="back" value="back" class="btn__back">修正する</button>
            </form>
        </section>
    </section>
@endsection
