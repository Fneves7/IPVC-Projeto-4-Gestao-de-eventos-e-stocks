<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Utilizadores
Route::resource('users', 'UsersController', ['except' => ['show', 'delete']]);
Route::resource('product', 'ProductController', ['except' => ['show']]);
Route::resource('event', 'EventController');
Route::resource('order', 'OrderController', ['except' => ['delete']]);
Route::resource('refund', 'RefundController', ['except' => ['delete']]);
Route::resource('transportguide', 'TransportGuideController', ['except' => ['update', 'delete']]);
Route::resource('stock', 'StockController');

//relatorios
Route::get('report/order', 'ReportsController@orders');
Route::get('report/refund', 'ReportsController@refunds');
Route::get('report/tg', 'ReportsController@tguide');

Route::resource('pedido', 'PedidoController');

Route::post('orderstatus', 'OrderController@status')->name('order.status');
Route::post('refundostatus', 'RefundController@status')->name('refund.update.status');


Route::prefix('admin')->name('admin.')->group(function () {
    //Utilizadores-Roles
    Route::resource('roles', 'RolesController', ['except' => ['show']]);
    Route::get('usersManagement', 'UsersController@indexAdmin')->name('usersManagement');
    Route::get('usersCreate', 'UsersController@create')->name('usersCreate');
    Route::post('storeUsers', 'UsersController@store')->name('storeUsers');
    Route::get('edit/{user}', 'UsersController@editUserAdmin')->name('editUserAdmin');
    Route::put('updateUsers/{user}', 'UsersController@updateUsers')->name('updateUsers');
    //Produtos
    Route::get('importExcel', 'ImportExcelController@index')->name('importProduct');
    Route::post('importExcel/import', 'ImportExcelController@import')->name('importExcel');
});
