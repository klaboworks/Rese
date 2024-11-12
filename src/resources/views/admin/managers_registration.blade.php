@extends('layouts.app')

@section('title', '店舗責任者登録')

@section('content')
    <section class="managers_resistration">
        <div class="managers_registration__inner">
            <form action="{{ route('admin.staff.registred') }}" method="post">
                @csrf
                <div>
                    <label for="name">名前</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit">登録する</button>
            </form>
        </div>
    </section>
@endsection
