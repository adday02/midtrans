<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\UserManagement\ProductCart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = ProductCart::where('user_id',Auth::user()->id)->whereNot('status','Waiting for payment')->get();
        return view('user_management.order.index',compact('carts'));
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
        $api_key = env('MIDTRANS_SERVER_KEY'); // Ganti dengan kunci API Midtrans Anda

        // Endpoint untuk mendapatkan status transaksi berdasarkan ID transaksi
        $url = "https://api.sandbox.midtrans.com/v2/".$request->transaction_id."/status";
    
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($api_key . ':'),
        ])->get($url);
    
        // Dapatkan status transaksi dari respons JSON
        $transaction_status = $response->json()['transaction_status'];



        $cart = ProductCart::find($request->id);
        $cart->transaction_id = $request->transaction_id;
        $cart->status = $transaction_status;
        $cart->save();

        return response()->json([
            'status' => true,
            'message'=> 'Payment Successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
