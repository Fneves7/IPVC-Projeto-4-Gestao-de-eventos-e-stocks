<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){

        return view('stock.index');
    }

}
