<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    //

    public function index(){
        $cart = session()->get('cart', []);
        return view('customer.cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $productId){

        $product = $request->findOrFail($productId);
        $cart = session()->get('cart', []);

        if($cart[$productId]){
            $cart[$productId]['quantity']++;
        }else{
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];

        }

        session()->put('cart', $cart);

        return redirect()->with('success', 'Product Added to cart');
    }
}
