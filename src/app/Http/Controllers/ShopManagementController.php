<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $shops = Shop::with('area', 'genre')->get();
        return view('admin.shop_index', compact('shops'));
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
    public function store(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            // $image->getClientOriginalName();
            // $path = $request->file('image')->storeAs('', $image);
            $path = Storage::put('', $image);
        } else {
            $path = null;
        }

        Shop::create([
            'shop_name' => $request->shop_name,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'shop_description' => $request->shop_description,
            'shop_image' => $path,
        ]);
        return redirect()->route('shop.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
