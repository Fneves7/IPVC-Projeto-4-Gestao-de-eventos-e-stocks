<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Excel;
use Illuminate\Support\Facades\Auth;


class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('products')->orderBy('id', 'DESC')->get() && DB::table('stocks')->orderBy('id', 'DESC')->get();
        return view('product.excel', compact('data'));
    }

    function import(Request $request)
    {
        if($request->hasFile('select_file')){
            $path = $request->file('select_file')->getRealPath();
            $data = Excel::load($path)->get();

            if($data->count()){
                foreach ($data as $key => $value) {
                    //print_r($value);
                    $product_list[] = [
                        'name' => $value->name,
                        'barcode' => $value->barcode,
                        'price' => $value->price
                    ];
                    $stock_list[] = [
                        'user_id' => Auth::user()->id,
                        'product_id' => $key+1,
                        'stock' => $value->stock,
                        'created_at' => Carbon::today(),
                        'updated_at' => Carbon::today()
                    ];
                }
//                dd($stock_list);
                if(!empty($product_list && $stock_list)){
                    Product::insert($product_list) && Stock::insert($stock_list);
//                    Stock::insert($stock_list);
                }else{
//                    return \Redirect::back()->withErrors(['Could not save the data.']);
                    return redirect()->back()->with('errorMsg', 'Não existe ficheiro para importar!');
                }
            }else{
//                return \Redirect::back()->withErrors(['Invalid data on the xml']);
                return redirect()->back()->with('errorMsg', 'Dados inválidos no xml');
            }
        }else{
//            return redirect()->back()->withErrors(['There is no file to import!']);
            return redirect()->back()->with('errorMsg', 'Não existe ficheiro para importar!');
        }

//        return redirect()->back()->with('success', 'Products Imported successfully.');
        return redirect()->back()->with('successMsg', 'Produtos importados com sucesso');
    }
}