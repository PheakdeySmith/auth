<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home(){

        $cartItems = [];
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = session()->get('cart', []);
        }

        return view("frontend.home.index", compact( 'cartItems'));
    }

    public function new_arrival(){
        $products = Product::all();
        $cartItems = [];
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = session()->get('cart', []);
        }
        return view("frontend.new_arrival.index", compact('products', 'cartItems'));
    }
}
