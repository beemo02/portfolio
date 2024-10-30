<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerMainController extends Controller
{
    //
    public function index()
    {
        
        return view('dashboard');
    }

    public function payment_setting()
    {
        
        return view('customer.payment');
    }

    public function order_history()
    {
        
        return view('customer.order.history');
    }

    public function affiliate()
    {
        
        return view('customer.affiliate');
    }

    

}
