@extends('layouts.app')

@section('title', '店舗責任者登録')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/managers_registration.css') }}">
@endsection

@section('content')
    <section class="managers_resistration">
        <div class="managers_registration__inner">
            <h1 class="page_title">店舗責任者登録</h1>
            <form action="{{ route('admin.staff.registred') }}" method="post" class="managers_registration__form">
                @csrf

                <table>
                    <tbody>
                        <tr class="form__managers_name">
                            <th><label for="name">名前</label></th>
                            <td><input type="text" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr class=form__managers_email>
                            <th> <label for="email">メールアドレス</label></th>
                            <td><input type="email" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="form__managers_password">
                            <th><label for="password">パスワード</label></th>
                            <td><input type="password" id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn__registration">登録する</button>
                <a href="{{ route('admin.shop.index') }}" class="btn__back">戻る</a>
            </form>
        </div>
    </section>
@endsection
