<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MasterCategoryController extends Controller
{
    //
    
    public function store_cat(Request $request){
    
    $requestVal = $request->validate([
        'createCat' => 'required|unique:categories,category_name|max:255',  // No space in 'unique'
    ]);
   
    
    Category::create([
        'category_name' => $request->createCat,  // Inserting the validated category name
    ]);
   
   
    return redirect()->back();
    }

    public function destroy_cat(String $id)
    {
        $category = Category::FindorFail($id);
        if($category->id != Auth::id())
        {
            return abort(403);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Categories created successfully.');
    }

    public function edit_cat(String $id)
    {
        $category = Category::FindorFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update_cat(Request $request, String $id)
    {
        $category = Category::FindorFail($id);
        $requestVal = $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:255',  // No space in 'unique'
        ]);

        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.manage')->with('success', 'Updated Successfully');
    }

    


}
