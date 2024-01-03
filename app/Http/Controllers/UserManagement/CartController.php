<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserManagement\ProductCart;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = ProductCart::where('user_id',Auth::user()->id)->where('status','Waiting for payment')->get();
        return view('user_management.cart.index',compact('carts'));
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
        $cart = ProductCart::where('user_id',Auth::user()->id)->where('status', 'Waiting for payment')->where('product_id',$request->product_id)->first();
        if($cart){
            $cart->amount +=1;
            $cart->total = $cart->amount * $request->price;
            $cart->save();
        }else{
            $cart = ProductCart::create([
                'user_id'       => Auth::user()->id,
                'product_id'    => $request->product_id,
                'amount'        => 1,
                'total'         => $request->price,
            ]);
        }

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                                        'order_id'      => rand(),
                                        'gross_amount'  => $cart->total,
                                    ],
            'customer_details'   => [
                                        'first_name'    => Auth::user()->name,
                                        'email'         => Auth::user()->email,
            ]
        ];

        // dd($params);
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $cart->snap_token = $snapToken;
        $cart->save();

        return redirect('cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = ProductCart::find($id);
        return view('user_management.cart.detail',compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCart::find($id)->delete();
        return back();
    }
}
