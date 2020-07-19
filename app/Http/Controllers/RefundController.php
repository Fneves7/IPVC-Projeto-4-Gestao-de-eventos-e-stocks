<?php

namespace App\Http\Controllers;

use App\Product;
use App\Refund;
use App\RefundDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RefundController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $getid = RefundDetail::all();
        $users = User::where('id','>',1)->get();

        return view('refund.create')->with(['products' => $products, 'users' => $users])->with('orders', $getid)->with('orderby', $getid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Refund();
        $input = Input::all();
        $order->user_id = Input::get('user_id');
        $order->status = $request->status;
        $order->save();
        $j = $order->id;
        if($j > 0){
            for($id = 0; $id < count($input['product_id']); $id++){
                $orderdetails = new RefundDetail();
                $orderdetails->order_id = $j;
                $orderdetails->product_id = $input['product_id'][$id];
                $orderdetails->quantity = $input['qty'][$id];
                $orderdetails->unitprice = $input['price'][$id];
                $orderdetails->discount = $input['dis'][$id];
                $orderdetails->amount = $input['amount'][$id];
                $orderdetails->save();
            }

            DB::table('stocks')->where('product_id', $orderdetails->product_id)->increment('stock', $orderdetails->quantity);
            //DB::table('products')->where('id', $orderdetails->product_id)->increment('stock', $orderdetails->quantity);

        }
        return redirect()->route('order.index')->with('successMsg', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Refund::where('id', '=', $id)->get();
        $orderd = RefundDetail::where('order_id', '=', $id)->get();
        return view('refund.show')->with(['orderd' => $orderd, 'order' => $order]);
    }

    //actualizar o status
    public function status(Request $request){
        $refund=Refund::find($request->id);
        if($refund->status == 1){
            $refund->status = 0;
            $refund->save();
            return redirect()->back()->with(['successMsg' => 'Rejeitado com sucesso']);
        }else{
            $refund->status = 1;
            $refund->save();
            return redirect()->back()->with(['successMsg' => 'Aprovado com sucesso']);
        }
    }
}
