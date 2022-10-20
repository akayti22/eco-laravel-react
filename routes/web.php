<?php

use App\Http\Controllers\PageController;
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

Route::get('/','PageController@home');

//for auth

Route::get('/register','AuthController@showRegister');
Route::post('/register','AuthController@register');

Route::get('/login','AuthController@showLogin');
Route::post('/login','AuthController@login');

Route::get('/logout','AuthController@logout');

//api route
Route::group(['prefix'=>'api','namespace'=>'Api'],function (){
    Route::get('/home','HomeApi@home');
}
);

Route::get('admin/login','Admin\AuthController@showLogin');
Route::post('admin/login','Admin\AuthController@login');
Route::group(['prefix' => 'admin','namespace' => 'Admin',"middleware"=>'isAdmin'],function(){
    Route::get('/dashboard','AuthController@dashboard');
    Route::resource('supplier','SupplierController');
    Route::resource('product','ProductController');
    Route::get('set-feature/{id}','ProductController@setFeature');
    Route::resource('product-add','ProductAddController');
    Route::resource('income','IncomeController');
});


