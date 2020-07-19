<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Refund;
use App\RefundDetail;
use App\TransportGuide;
use App\TransportGuideDetail;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function orders()
    {
        $orders=Order::all();
        $getid = OrderDetail::all();

        return view('report.order')->with([
            'orders' => $orders,
            'getid' => $getid,
        ]);
    }

    public function refunds()
    {
        $refunds=Refund::all();
        $tg=TransportGuide::all();
        $refundgetid = RefundDetail::all();

        return view('report.refund')->with([
            'refunds' => $refunds,
            'refundgetid' => $refundgetid,
        ]);
    }

    public function tguide()
    {
        $tg=TransportGuide::all();
        $tggetid = TransportGuideDetail::all();

        return view('report.tg')->with([
            'tg' => $tg,
            'tggetid' => $tggetid,
        ]);
    }

}
