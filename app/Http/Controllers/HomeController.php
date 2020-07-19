<?php

namespace App\Http\Controllers;

use App\Event;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $allevents = Event::all();
        //colocar eventos inactivos
        Event::checkActiveEvent($allevents);

        //mostrar eventos que pertencem ao user
        $events=Event::where('status', '=' ,1)->count();

        $products=Product::all();
        $ordercount=Order::all()->count();
        $orders=Order::all();
        $allorders=OrderDetail::all();


        $stocks=Stock::where('user_id', '=',$user_id);

        $fewprod = Stock::where([
            ['user_id', '=', Auth::user()->id],
            ['stock', '<=', 5],
        ])->get();

//        dd($fewprod);

        return view('home')->with([
            'events' => $events,
            'products' => $products,
            'fewprod' => $fewprod,
            'stocks' => $stocks,
            'ordercount' => $ordercount,
            'orders' => $orders,
            'allorders' => $allorders
        ]);
    }
}
