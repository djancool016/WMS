<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('supplier', 'SupplierController');
Route::resource('departement', 'DepartementController');
Route::resource('profile', 'ProfileController');
Route::resource('jenis_barang', 'JenisBarangController');
Route::resource('barang', 'BarangController');
Route::resource('user_account', 'UserAccountController');
Route::resource('status', 'StatusController');
Route::resource('customer', 'CustomerController');
