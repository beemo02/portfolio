<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function create_payment()
    {
        return view('admin.payment.create');
    }

    public function manage_payment()
    {
        return view('admin.payment.manage');
    }
}
