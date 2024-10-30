<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerMainController extends Controller
{
    public function index()
    {
        return view('seller.vendor');
    }

    public function order_history()
    {
        return view('seller.order.history');
    }
}
