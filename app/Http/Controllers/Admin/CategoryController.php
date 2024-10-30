<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
class CategoryController extends Controller
{
    //
    public function create_category()
    {
        return view('admin.category.create');
    }

    public function manage_category()
    {
        $categories = Category::paginate(10);
        
        return view('admin.category.manage', compact('categories'));
    }
}
