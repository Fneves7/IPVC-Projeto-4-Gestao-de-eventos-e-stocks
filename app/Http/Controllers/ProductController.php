<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('a-w-s')){
            return redirect(route('home'));
        }

        $stocks=Stock::all();
        $products=Product::all();

        return view('product.index')->with([
            'products' => $products,
            'stocks' => $stocks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('a-w-s')){
            return redirect(route('home'));
        }
        
        $products=Product::all();

        return view('product.create')->with([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        //registar o stock
        $stock = new Stock;
        $stock->user_id = $request->user_id;
        $stock->product_id = $product->id;
        $stock->stock = $request->stock;
        $stock->save();

        return redirect()->route('product.index')->with('successMsg', 'Criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(Gate::denies('a-w-s')){
            return redirect(route('home'))->with('warningMsg', 'Não possui permissões');
        }

        $stocks = Stock::where('product_id', '=', $product->id)->get();

        foreach ($stocks as $key){
            $stock=$key->stock;
        }

        return view('product.edit')->with(['product' => $product, 'stock' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();


        $stock = Stock::where('product_id', '=', $product->id);
        $stock->user_id = $request->user_id;
        $stock->product_id = $product->id;
        $stock->stock = $request->stock;


        //update
        Stock::where('product_id', '=', $product->id)->update([
//            'product_id' => $stock->product_id,
//            'user_id' => $stock->user_id,
            'stock' => $stock->stock
        ]);

        return redirect()->route('product.index')->with('successMsg', 'Actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Gate::denies('admin-view')){
            return redirect(route('home'));
        }
        try {
            $product = Product::findOrFail($product->id);
            $product->delete();
            return redirect()->back()->with('successMsg', 'Eliminado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMsg', 'Ocorreu um erro!');
        }
    }
}
