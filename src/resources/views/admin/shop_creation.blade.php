@extends('layouts.app')

@section('title')
    <p>店舗登録</p>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_creation.css') }}">
@endsection

@section('content')
    <section class="shop-creation">
        <div class="shop-creation__inner">
            <form action="{{ route('shop.store') }}" method="POST" class="shop-creation-form">
                @csrf
                <div class="form__shop_name">
                    <label for="shop_name" class="shop_name__label">店舗名</label>
                    <input type="text" name="shop_name" class="shop_name">
                </div>
                <div class="form__shop_description">
                    <label for="shop_description" class="shop_description__label">店舗詳細</label>
                    <textarea name="shop_description" id="" cols="30" rows="10" class="shop_description"></textarea>
                </div>
                <div class="form__shop_category">
                    <select name="" id="">
                        <option value="">
                            カテゴリを選ぶ
                        </option>
                    </select>
                </div>
                <div class="form__shop_image">
                    <p>イメージ</p>
                </div>
                <button>
                    作成する
                </button>
            </form>
        </div>
    </section>
@endsection
