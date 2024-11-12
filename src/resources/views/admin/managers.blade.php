@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shop_edit.css') }}">
@endsection

@section('content')
    <section class="shop_edit">
        test
        @foreach ($staffs as $staff)
            <ul>
                <li>{{ $staff->name }}</li>
            </ul>
        @endforeach
    </section>
@endsection
