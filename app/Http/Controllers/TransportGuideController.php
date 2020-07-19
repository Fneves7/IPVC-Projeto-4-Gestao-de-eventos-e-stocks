<?php

namespace App\Http\Controllers;

use App\TransportGuide;
use App\TransportguideDetail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TransportGuideController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $getid = TransportGuideDetail::all();
        $users = User::where('id','>',1)->get();

        return view('transportguide.create')->with(['products' => $products, 'users' => $users])->with('orders', $getid)->with('orderby', $getid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new TransportGuide();
        $input = Input::all();
        $order->user_id = Input::get('user_id');
        $order->save();
        $j = $order->id;
        if($j > 0){
            for($id = 0; $id < count($input['product_id']); $id++){
                $orderdetails = new TransportGuideDetail();
                $orderdetails->order_id = $j;
                $orderdetails->product_id = $input['product_id'][$id];
                $orderdetails->quantity = $input['qty'][$id];
                $orderdetails->unitprice = $input['price'][$id];
                $orderdetails->discount = $input['dis'][$id];
                $orderdetails->amount = $input['amount'][$id];
                $orderdetails->save();
            }
        }
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransportGuide  $transportGuide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tg=TransportGuide::where('id', '=', $id)->get();
        $tgd = TransportGuideDetail::where('order_id', '=', $id)->get();

        return view('transportguide.show')->with(['tgd' => $tgd, 'tg' => $tg]);
    }
}
