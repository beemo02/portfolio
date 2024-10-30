<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class StoreController extends Controller
{
    //

    public function index()
    {
        return view('seller.store.create');
    }

    public function store(Request $request)
    {
        Store::create([
            'name' => $request->store_name,
            'details' => $request->details,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', "Store Created Successfully");
    }

    public function manage_store()
    {
        $stores = Store::all();
        return view('seller.store.manage', compact('stores'));
    }

    public function destroy(String $id)
    {
        $store = Store::FindorFail($id);
        

        $store->delete();

        return redirect()->back()->with('success', 'Store deleted successfully.');
    }

    public function edit(String $id)
    {
        $store = Store::FindorFail($id);

        return view('seller.products.edit', compact('store'));
    }

    public function update(Request $request, String $id)
    {
        $store = Store::FindorFail($id);
       
        $store->update([
            'name' => $request->store_name,
            'details' => $request->details 
        ]);

        return redirect()->route('store.manage')->with('success', 'Updated Successfully');
    }

}
