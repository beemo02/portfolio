<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //
    public function create_subcategory()
    {   
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function manage_subcategory()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('admin.subcategory.manage', compact('subCategories'));
    }
}
