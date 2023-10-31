<?php

use App\Models\About;
use App\Models\Cart;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

if (! function_exists('about')) {
    function about() {
        return About::first();
    }
}
if (! function_exists('CartCount')) {
    function CartCount() {
        if(isset(auth()->user()->id)) {
            return Cart::where('session_id', (auth()->user()->id))->get()->count();
        }
        return Cart::where('session_id', Session::getId())->get()->count();
    }
}
if (! function_exists('productStatus')) {
    function productStatus() {
        return Setting::first()->pro_status;
    }
}
if (! function_exists('MyCur')) {
    function MyCur() {
        return Setting::first()->currency;
    }
}
