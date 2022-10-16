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
    return view('welcome');
});


Route::get('admin/login','Admin\AuthController@showLogin');
Route::post('admin/login','Admin\AuthController@login');
Route::group(['prefix' => 'admin','namespace' => 'Admin',"middleware"=>'isAdmin'],function(){
    Route::get('/dashboard','AuthController@dashboard');
    Route::resource('supplier','SupplierController');
    Route::resource('product','ProductController');
    Route::resource('product-add','ProductAddController');

});


