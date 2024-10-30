<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function create()
    {
        $categories = Category::with('subcategories')->get();

        return view('admin.product.create', compact('categories'));
    }
    
    public function manage_product()
    {
        $products = Product::all();
        //dd($products);
        return view('admin.product.manage', compact('products'));

    }

    public function manage_review()
    {
        return view('admin.product.manage_product_review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'string',
            'subCategoryId' => 'required|exists:sub_categories,id',
            'productImage' => 'required|mimes:jpeg,bmp,png'
        ]);
        //dd($request->file('productImage'));
        if($request->hasFile('productImage')){
            $imageFile = $request->file('productImage')->store('products', 'public');
        }

        
        $product = Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'productDescription' => $request->productDescription,
            'sub_category_id' => $request->subCategoryId,
            'image' => $imageFile,
        ]);

        

        

        return redirect()->back()->with('success', 'Product Successfully Added');

    }

    public function edit(String $id)
    {
        $products = Product::FindorFail($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, String $id)
    {
        $products = Product::FindorFail($id);
        
        $products->update([
            'name' => $request->name,
            'price' => $request->price,
            'productDescription' => $request->productDescription
        ]);

        return redirect()->route('admin.products.manage')->with('success', 'Updated Successfully');
    }

    public function destroy(String $id)
    {
        $products = Product::FindorFail($id);
       
        $products->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


}
