<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubCategory;

class MasterSubcategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        //$subcategory = $request->subcategory;

        //dd( $subcategory, $request->category);
        
        $request->validate([
            'subcategory' => 'required|unique:sub_categories,name|string|max:255',
            'category' => 'required|exists:categories,id|integer',
        ]);
        
        SubCategory::create([
            'name' => $request->subcategory,
            'category_id' => $request->category,
        ]);

        return redirect()->back()->with('success', 'Sub Categories created successfully ');



    }

    public function edit(String $id)
    {
        $subCat = SubCategory::FindorFail($id);
        return view('admin.subcategory.edit', compact('subCat'));
    }

    public function update(Request $request, String $id)
    {
        $subCat = SubCategory::FindorFail($id);
        $request->validate([
            'scategory_name' => 'required|unique:sub_categories,name|max:255',  // No space in 'unique'
        ]);

        $subCat->update([
            'name' => $request->scategory_name,
        ]);

        return redirect()->route('subcategory.manage')->with('success', 'Updated Successfully');
    }

    public function destroy(String $id)
    {
        $scategory = SubCategory::FindorFail($id);
       
        $scategory->delete();

        return redirect()->back()->with('success', 'Subcategories deleted successfully.');
    }
}
