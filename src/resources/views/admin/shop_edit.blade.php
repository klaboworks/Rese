@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_edit.css') }}">
@endsection

@section('content')
    <section class="shop_edit">
        <form action="{{ route('admin.shop.update') }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            <input type="text" name="shop_name" value="{{ $shop->shop_name }}">
            <select name="area_id">
                <option value="{{ $shop->area->area_id }}" selected disabled>{{ $shop->area->area_name }}
                </option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                @endforeach
            </select>
            <select name="genre_id">
                <option value="{{ $shop->genre->genre_id }}" selected disabled>{{ $shop->genre->genre_name }}</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                @endforeach
            </select>
            <textarea name="shop_description" cols="30" rows="10">
            {{ $shop->shop_description }}
        </textarea>
            <button>更新</button>
        </form>
    </section>
@endsection
