<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //

    public function index(){

        $products = Product::with(['subcategories', 'store'])->get();
        $categories = Category::with('subcategories')->get();
        
        return view('customer.shop.manage', compact('categories', 'products'));
    }

    public function forceLogout()
    {
        Auth::logout(); 
        return redirect('/'); 
    }
    
    public function products_subcategory($subcategoryId)
    {
        $subcategory = Subcategory::with('products')->findOrFail($subcategoryId);
        //dd($subcategory->products);
        $categories = Category::all(); 

        $products = $subcategory->products;
        
        return view('customer.shop.specific', compact('subcategory', 'categories', 'products'));
    }

    public function add(Request $request){
        
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = Session::get('cart', []);

        if(isset($cart[$productId])){
            $cart[$productId] += $quantity;
        }else{
            $cart[$productId] = $quantity;
        }

        Session::put('cart', $cart);

        return response()->json(['success' => true]);

    }

    public function count()
    {
        $cart = Session::get('cart', []);
        $count = array_sum($cart);
        
        return response()->json(['count' => $count]);
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        $productId = array_keys($cart);
        $products = Product::whereIn('id', $productId)->get();
        $cartItems = [];
        $subtotal = 0;
        foreach($products as $product){
            $quantity = $cart[$product->id];
            $itemSubtotal = $quantity * $product->price;
            $subtotal += $itemSubtotal;
            $cartItems[] = [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $itemSubtotal,
            ];
        }
       
        $count = array_sum($cart);
        
        return view('customer.shop.cart', compact('cartItems', 'count', 'subtotal'));

        
    }

}
