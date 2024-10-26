<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reservation;

class UserController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('mypage', compact('shops'));
    }

    public function favorite(Request $request)
    {
        $fav = Favorite::where('user_id', $request->user_id)
            ->where('shop_id', $request->shop_id)
            ->latest()->first();

        if ($fav) {
            Favorite::find($fav)->first()->delete();
        } else {

            Favorite::create([
                'user_id' => $request->user_id,
                'shop_id' => $request->shop_id,
            ]);
        }
        return redirect()->back();
    }

    public function reserve(ReservationRequest $request)
    {
        Reservation::create([
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ]);

        return view('thanks.reserved');
    }

    public function updateReserve(Request $request)
    {
        $newReservation = $request->only(['date', 'time', 'number']);
        Reservation::find($request->id)->update($newReservation);
        return redirect()->route('user.mypage')->with('message', '予約を変更しました');
    }

    public function cancelReserve(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect()->route('user.mypage')->with('message', '予約をキャンセルしました');
    }
}
