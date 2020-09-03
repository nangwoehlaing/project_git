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
Route::get('brand', 'PageController@brandfun')->name('brandpage');
Route::get('itemdetail', 'PageController@itemdetailfun')->name('itemdetailpage');
Route::get('loginpage', 'PageController@loginfun')->name('loginpage');
Route::get('promotion', 'PageController@promotionfun')->name('promotionpage');
Route::get('registerpage', 'PageController@registerfun')->name('registerpage');
Route::get('shoppingcart', 'PageController@shoppingcartfun')->name('shoppingcartpage');
Route::get('registerpage','PageController@register')->name('registerpage');

//backend
Route::middleware('role:Admin')->group(function(){
Route::get('dashboard', 'BackenController@dashboardfun')->name('dashboardpage');
Route::resource('items', 'ItemController');
Route::resource('brands', 'BrandController');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubCategoryController');

});
Route::resource('orders', 'OrderController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');