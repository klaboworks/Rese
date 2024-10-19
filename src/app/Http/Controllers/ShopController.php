<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Favorite;

class ShopController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area', 'genre')->get();
        // dd($shops);
        return view('index', compact('areas', 'genres', 'shops'));
    }

    public function menu()
    {
        return view('menu');
    }

    public function search(Request $request)
    {
        // dd($request);
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area', 'genre')
            ->AreaSearch($request->shop_area)
            ->GenreSearch($request->shop_genre)
            ->KeywordSearch($request->shop_name)
            ->get();
        return view('index', compact('areas', 'genres', 'shops'));
    }

    public function detail(Shop $shop)
    {
        return view('detail', ['shop' => $shop]);
    }

    public function favorite(Request $request)
    {
        Favorite::create([
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
        ]);
        return redirect()->route('shop.index');
    }
}
