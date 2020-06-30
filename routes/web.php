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
    return redirect()->back();
});

Route::get('/tour', 'TourController@getList');
Route::get('add-tour', 'TourController@getAdd');
Route::post('add-tour', 'TourController@postAdd');



Route::get('index', [
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);

Route::get('loaisanpham/{type}', [
    'as' => 'loaisanpham',
    'uses' => 'PageController@getTypeProduct'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('contact',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('about',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'addtocart',
	'uses'=>'PageController@getAddToCart'
]);

Route::get('delete-cart/{id}',[
	'as'=>'deletecart',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignup'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignup'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
// Route::group(['prefix' => 'index'], function () {
//     Route::get('/', 'SlideController@getList');
//     Route::get('/', 'ProductController@getList');
// });

// Route::group(['prefix'=>'/index'],function(){
//     Route::post('index', 'SlideController@getList');
//     Route::post('index', 'ProductController@getList');
// });

Route::get('admin',[
	'as'=>'administrator',
	'uses'=>'PageController@getAdmin'
]);



