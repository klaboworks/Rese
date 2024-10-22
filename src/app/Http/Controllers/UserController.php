<?php

namespace App\Http\Controllers;

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

    public function reserve(Request $request)
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
}
