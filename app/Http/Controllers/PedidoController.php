<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoDetail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $getid = PedidoDetail::all();
        $users = User::where('id','>',1)->get();

        return view('pedido.index')->with([
            'pedidos' => $pedidos,
            'getid' => $getid,
            'users' => $users
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
        $getid = PedidoDetail::all();
        $users = User::where('id','>',1)->get();

        return view('pedido.create')->with(['products' => $products, 'users' => $users])->with('orders', $getid)->with('orderby', $getid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Pedido();
        $input = Input::all();
        $order->user_id = Input::get('user_id');
        $order->save();
        $j = $order->id;
        if($j > 0) {
            for ($id = 0; $id < count($input['product_id']); $id++) {
                $orderdetails = new PedidoDetail();
                $orderdetails->order_id = $j;
                $orderdetails->product_id = $input['product_id'][$id];
                $orderdetails->quantity = $input['qty'][$id];
                $orderdetails->save();
            }
        }
        return redirect()->route('pedido.index')->with('successMsg', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Pedido::where('id', '=', $id)->get();
        $orderd = PedidoDetail::where('order_id', '=', $id)->get();
        return view('pedido.show')->with(['orderd' => $orderd, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $products = Product::all();
        $getid = PedidoDetail::all();

        return view('pedido.edit')->with([
            'products' => $products,
            'orders', $getid,
            'getid' => $getid,
            'pedido' => $pedido
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $input = Input::all();
        $pedido->user_id = Input::get('user_id');
        $pedido->save();
        $j = $pedido->id;

        if($j > 0) {
            for ($id = 0; $id < count($input['product_id']); $id++) {
                $orderdetails = new PedidoDetail();
                $orderdetails->order_id = $j;
                $orderdetails->product_id = $input['product_id'][$id];
                $orderdetails->quantity = $input['qty'][$id];
                $orderdetails->save();
            }
        }
        return redirect()->route('pedido.index')->with('successMsg', 'Actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido = Pedido::findOrFail($pedido->id);
        $pedido->pedidoDetail()->delete();
        $pedido->delete();
        return redirect()->route('pedido.index')->with('successMsg', 'deu');
    }
}
