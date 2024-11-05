<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cartItems = store()->get('cart', []);

        foreach($cartItems as $cart){
            Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'total' => $cart['price'] * $cart['quantity'],
                'status' => 'pending'
            ]);
        }

        session()->forget('cart', $cartItems);

        return redirect()->with('success', 'Order placed successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function process(Request $request)
    {
        // Validate request
        $request->validate([
            'card_name' => 'required|string|max:255',
            'card_number' => 'required|numeric',
            'expiration' => 'required|string',
            'cvv' => 'required|numeric',
        ]);
    
        // Get cart from session
        $cart = Session::get('cart', []);
    
        // Calculate total order amount
        $total = array_sum(array_map(fn($qty, $id) => $qty * Product::find($id)->price, $cart, array_keys($cart)));
    
        // Create new order
        $order = new Order;
        $order->user_id = auth()->id();
        $order->cart = json_encode($cart);
        $order->total = $total;
        $order->status = Order::STATUS_PENDING;
        $order->save(); 
    
        
        Session::forget('cart'); 
    
       
        return redirect()->back()->with('success', 'Order placed successfully!');
    }
    
}
