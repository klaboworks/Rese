<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class UserController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('mypage', compact('shops'));
    }
}
