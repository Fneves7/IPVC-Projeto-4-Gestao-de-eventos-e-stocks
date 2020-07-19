<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Refund;
use App\RefundDetail;
use App\TransportGuide;
use App\TransportGuideDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = Order::all();
            $refunds = Refund::all();
            $tg = TransportGuide::all();
            $getid = OrderDetail::all();
            $refundgetid = RefundDetail::all();
            $tggetid = TransportGuideDetail::all();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return view('order.index')->with([
            'orders' => $orders,
            'refunds' => $refunds,
            'tg' => $tg,
            'getid' => $getid,
            'refundgetid' => $refundgetid,
            'tggetid' => $tggetid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $getid = OrderDetail::all();
        $users = User::where('id', '>', 1)->get();

        return view('order.create')->with(['products' => $products, 'users' => $users])->with('orders', $getid)->with('orderby', $getid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $input = Input::all();
        $order->user_id = Input::get('user_id');
        $order->status = $request->status;
        $order->save();
        $j = $order->id;
        if ($j > 0) {
            for ($id = 0; $id < count($input['product_id']); $id++) {
                $orderdetails = new OrderDetail;
                $orderdetails->order_id = $j;
                $orderdetails->product_id = $input['product_id'][$id];
                $orderdetails->quantity = $input['qty'][$id];
                $orderdetails->unitprice = $input['price'][$id];
                $orderdetails->discount = $input['dis'][$id];
                $orderdetails->amount = $input['amount'][$id];
                $orderdetails->save();
            }

            DB::table('stocks')->where('product_id', $orderdetails->product_id)->decrement('stock', $orderdetails->quantity);

            //DB::table('stocks')->where('stock_name', $request->input('product_name'))->decrement('stock_quantity', $request->input('sale_quantity'));

        }
//        $products = Product::all();
//        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
//        $orderby = Order::where('id', $order->id)->get();
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id', '=', $id)->get();
        $orderd = OrderDetail::where('order_id', '=', $id)->get();

//        foreach($orderd as $key){
//            dd($key->products()->get());
//        }
//        dd(DB::table('order_details')->sum('amount'));
        return view('order.show')->with(['orderd' => $orderd, 'order' => $order]);
    }

    //actualizar o status
    public function status(Request $request){
        $order=Order::find($request->id);
        if($order->status == 1){
            $order->status = 0;
            $order->save();
            return redirect()->back()->with(['errorMsg' => 'Rejeitado com sucesso']);
        }else{
            $order->status = 1;
            $order->save();
            return redirect()->back()->with(['successMsg' => 'Aprovado com sucesso']);
        }
    }
}
