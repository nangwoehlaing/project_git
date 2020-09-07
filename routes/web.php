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

Route::get('/', 'PageController@home')->name('homepage');

Route::get('brand/{id}', 'PageController@brandfun')->name('brandpage');

Route::get('itemdetail/{id}', 'PageController@itemdetailfun')->name('itemdetailpage');

Route::get('promotion', 'PageController@promotionfun')->name('promotionpage');

Route::get('subcategory/{id}', 'PageController@subcategoryfun')->name('subcategorypage');

Route::post('filterwithcategory','PageController@filterwithcategory')->name('filterwithcategory');

Route::get('shoppingcart', 'PageController@shoppingcartfun')->name('shoppingcartpage');

Route::get('registerpage','PageController@register')->name('registerpage');

Route::get('loginpage', 'PageController@loginfun')->name('loginpage');


//backend
Route::middleware('role:Admin')->group(function(){

Route::get('dashboard', 'BackendController@dashboardfun')->name('dashboardpage');

Route::resource('items', 'ItemController');
Route::resource('brands', 'BrandController');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubCategoryController');

});

Route::resource('orders', 'OrderController');
Route::get('order_detail','OrderController@order_history')->name('order_detail');
Route::post('order_search','OrderController@order_search')->name('order_search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');