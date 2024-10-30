<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    //
    public function create_discount()
    {
        return view('admin.discount.create');
    }

    public function manage_discount()
    {
        return view('admin.discount.manage');
    }
}
