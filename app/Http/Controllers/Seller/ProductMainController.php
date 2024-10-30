<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Store;
use App\Models\Product;

class ProductMainController extends Controller
{
    //
    
    
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $stores = Store::all();
        
        return view('seller.products.create', compact('categories', 'stores'));
    }

    public function manage_product(Request $request)
    {
        $stores = Store::all();
        $categories = Category::with('subcategories')->get();
        $query = Product::query();

        if($request->has('store_id') && $request->store_id != ''){
            $query->where('store_id', $request->store_id);
        }

        if($request->has('store_id') && $request->store_id != ''){
            $query->where('store_id', $request->store_id);
        }

        if($request->has('category') && $request->category != ''){
            $query->whereHas('subcategories.category', function($q) use ($request){
                $q->where('id', $request->category);
            });
        }

        if($request->has('price_min') && $request->price_min != ''){
            $query->where('price', '>=',  $request->price_min);
        }

        if($request->has('price_max') && $request->price_max != ''){
            $query->where('price', '<=',  $request->price_max);
        }
        
        $products = $query->with('store', 'subcategories.category')->get();
        return view('seller.products.manage', compact('products', 'stores', 'categories'));
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->category_id;
        
        $subcategories = Subcategory::where('category_id', $categoryId)->get();

        return response()->json([
        'success' => true,
        'subcategories' => $subcategories
        ]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('productImage')){
            $imageFile = $request->file('productImage')->store('products', 'public');
        }
        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'productDescription' => $request->productDescription,
            'sub_category_id' => $request->subCategoryID,
            'store_id' => $request->stores,
            'image' => $imageFile

        ]);

        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    public function edit(String $id)
    {
        $products = Product::FindorFail($id);
        return view('seller.products.edit', compact('products'));
    }

    public function update(Request $request, String $id)
    {
        $products = Product::FindorFail($id);
        
        $products->update([
            'name' => $request->name,
            'price' => $request->price,
            'productDescription' => $request->productDescription
        ]);

        return redirect()->route('product.manage')->with('success', 'Updated Successfully');
    }

    public function destroy(String $id)
    {
        $products = Product::FindorFail($id);
       
        $products->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function filter(Request $request)
    {


    }

}
