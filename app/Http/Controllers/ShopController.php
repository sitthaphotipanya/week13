<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Shop;

class ShopController extends Controller
{
    private $title = 'Shop';

    function list() {
        return view('shop-list', [
            'title' => "{$this->title} : List",
            'shops' => shop::orderBy('code')->get(),
        ]);
    }

    function show($shopCode) {
        $shop = Shop
            ::where('code', $shopCode)
            ->firstOrFail();
    
        return view('shop-view', [
            'title' => "{$this->title} : View",
            'shop' => $shop,
        ]);
    }   
}