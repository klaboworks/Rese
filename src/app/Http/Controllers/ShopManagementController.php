<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRegistrationRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image as InterventionImage;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ShopManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area', 'genre')->Paginate(5);
        return view('admin.shop_index', compact('shops', 'areas', 'genres'));
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area', 'genre')
            ->AreaSearch($request->shop_area)
            ->GenreSearch($request->shop_genre)
            ->KeywordSearch($request->shop_name)
            ->UserIdSearch($request->user_id)
            ->Paginate(5);
        return view('admin.shop_index', compact('areas', 'genres', 'shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view('admin.shop_registration', compact('areas', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRegistrationRequest $request)
    {
        $image = $request->file('image');

        if ($image) {
            $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('', $image);
            $path = Storage::put('', $image);
        } else {
            $path = null;
        }

        Shop::create([
            'shop_name' => $request->shop_name,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'user_id' => $request->user_id,
            'shop_description' => $request->shop_description,
            'shop_image' => $path,
        ]);
        return redirect()->route('admin.shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view('admin.shop_edit', compact('shop', 'areas', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $newShopData = $request->only(['shop_id', 'shop_name', 'area_id', 'genre_id', 'shop_description']);
        Shop::find($request->shop_id)->update($newShopData);
        return redirect()->route('admin.shop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Shop $shop)
    {
        if ($request->user()->cannot('update', $shop)) {
            abort(403);
        }

        Shop::find($request->shop_id)->delete();
        return redirect()->route('admin.shop.index');
    }

    public function reservations(Shop $shop)
    {
        return view('admin.shop_reservations', compact('shop'));
    }
}
