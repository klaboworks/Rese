@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_reservations.css') }}">
@endsection

@section('content')
@php
$users = $shop->confirmReservations();
@endphp

<section class="shop_reservations">
    <div class="heading__top-bar">
        <div class="top-bar__inner">
            <div>
                <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
            </div>
            <div>
                <a href="{{ route('admin.shop.index') }}">管理トップへ</a>
                <form action="/logout" method="post">
                    @csrf
                    <button>ログアウト</button>
                </form>
            </div>
        </div>
    </div>

    <div class="shop_reservations__inner">
        <div class="shop_reservations__heading">
            <p class="reservations_list">
                予約一覧
            </p>
            <p class="shop_name">
                - {{ $shop->shop_name }} -
            </p>
        </div>
        <table class="shop_reservations__table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ユーザー名</th>
                    <th>ユーザーアドレス</th>
                    <th>日時</th>
                    <th>人数</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="reservations__data">
                    <td class="reservation_number"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ (new Carbon\Carbon($user->pivot->date))->isoFormat('Y年MM月DD日(ddd)') }} / {{ (new Carbon\Carbon($user->pivot->time))->format('H:i') }}</td>
                    <td>{{ $user->pivot->number }}人</td>
                </tr>
                @empty
                <p>予約はありません</p>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<script>
    const number = document.querySelectorAll('.reservation_number');
    for (let i = 0; i < number.length; i++) {
        number[i].textContent = i + 1;
    }
</script>
@endsection