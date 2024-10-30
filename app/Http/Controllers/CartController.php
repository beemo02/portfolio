<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

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

}
