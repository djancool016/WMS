<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
});

require __DIR__.'/auth.php';

Route::resource('suplier', 'SupplierController');
Route::resource('departement', 'DepartementController');
Route::resource('profile', 'ProfileController');
Route::resource('jenis_barang', 'JenisBarangController');
Route::resource('barang', 'BarangController');
Route::resource('user_account', 'UserAccountController');
