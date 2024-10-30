<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    //
    public function create_productAttribute()
    {
        return view('admin.product-attribute.create');
    }

    public function manage_productAttribute()
    {
        return view('admin.product-attribute.manage');
    }
}
