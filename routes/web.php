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

//weird
Route::get('index',[
	'as'=>'index',
	'uses'=>'PageController@index'
]);

Route::get('category/{type}',[
	'as'=>'category',
	'uses'=>'PageController@category'
]);


//sorting
Route::get('categorysortgiam/{type}',[
	'as'=>'categorysortgiam',
	'uses'=>'PageController@categorySortGiam'
]);
Route::get('categorysorttang/{type}',[
	'as'=>'categorysorttang',
	'uses'=>'PageController@categorySortTang'
]);
Route::get('categorysortaz/{type}',[
	'as'=>'categorysortaz',
	'uses'=>'PageController@categorySortAZ'
]);
Route::get('categorysortza/{type}',[
	'as'=>'categorysortza',
	'uses'=>'PageController@categorySortZA'
]);
// Route::get('category',[
// 	'as'=>'category',
// 	'uses'=>'PageController@category'
// ]);

Route::get('product_detail/{id}',[
	'as'=>'product_detail',
	'uses'=>'PageController@product_detail'
]);



//about checkout contact login signin
Route::get('about',[
	'as'=>'about',
	'uses'=>'PageController@about'
]);

Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@contact'
]);



Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@login'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'PageController@logout'
]);





Route::get('signin',[
	'as'=>'signin',
	'uses'=>'PageController@signin'
]);
Route::post('signin',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);
Route::get('userinfo',[
	'as'=>'userinfo',
	'uses'=>'PageController@userinfo'
]);
Route::post('userinfo',[
	'as'=>'userinfo',
	'uses'=>'PageController@postUserinfo'
]);
Route::get('changepass',[
	'as'=>'changepass',
	'uses'=>'PageController@changepass'
]);
Route::post('changepass',[
	'as'=>'changepass',
	'uses'=>'PageController@postChangepass'
]);









Route::get('muahang/{id}',[
	'as'=>'muahang',
	'uses'=>'PageController@muahang'
]);
Route::post('muahang/{id}','PageController@muahang');


Route::get('cart',[
	'as'=>'cart',
	'uses'=>'PageController@cart'
]);









Route::get('deletesp/{id}',[
	'as'=>'deletesp',
	'uses'=>'PageController@deletesp'
]);
//need to store another value reducesp/{id}/{qty}
Route::get('reducesp/{id}',[
	'as'=>'reducesp',
	'uses'=>'PageController@reducesp'
]);
Route::get('addsp/{id}',[
	'as'=>'addsp',
	'uses'=>'PageController@addsp'
]);









Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);




Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@search'
]);

























//Route for admin
Route::get('admin_login',[
	'as'=>'admin_login',
	'uses'=>'AdminController@adminlogin'
]);
Route::get('admin',[
	'as'=>'admin',
	'uses'=>'AdminController@adminindex'
]);
Route::post('admin',[
	'as'=>'admin',
	'uses'=>'AdminController@postAdmin'
]);
Route::get('admin_logout',[
	'as'=>'admin_logout',
	'uses'=>'AdminController@logout'
]);





Route::get('admin_orders',[
	'as'=>'admin_orders',
	'uses'=>'AdminController@adminOrders'
]);
Route::get('admin_orders_detail/{id}',[
	'as'=>'admin_orders_detail',
	'uses'=>'AdminController@adminOrdersDetail'
]);
Route::get('admin_orders_confirm/{id}',[
	'as'=>'admin_orders_confirm',
	'uses'=>'AdminController@adminOrdersConfirm'
]);
Route::get('admin_orders_done/{id}',[
	'as'=>'admin_orders_done',
	'uses'=>'AdminController@adminOrdersDone'
]);
Route::get('admin_orders_cancel/{id}',[
	'as'=>'admin_orders_cancel',
	'uses'=>'AdminController@adminOrdersCancel'
]);






Route::get('admin_doanhthu',[
	'as'=>'admin_doanhthu',
	'uses'=>'AdminController@adminDoanhthu'
]);
Route::post('admin_doanhthu',[
	'as'=>'admin_doanhthu',
	'uses'=>'AdminController@postAdminDoanhthu'
]);









Route::get('admin_product',[
	'as'=>'admin_product',
	'uses'=>'AdminController@adminProduct'
]);
Route::get('admin_product_add',[
	'as'=>'admin_product_add',
	'uses'=>'AdminController@adminProductAdd'
]);
Route::post('product_add',[
	'as'=>'product_add',
	'uses'=>'AdminController@productAdd'
]);
Route::get('admin_product_edit/{id}',[
	'as'=>'admin_product_edit',
	'uses'=>'AdminController@adminProductEdit'
]);
Route::post('product_update/{id}',[
	'as'=>'product_update',
	'uses'=>'AdminController@productUpdate'
]);
Route::get('admin_product_delete/{id}',[
	'as'=>'admin_product_delete',
	'uses'=>'AdminController@productDelete'
]);






Route::get('admin_category',[
	'as'=>'admin_category',
	'uses'=>'AdminController@adminCategory'
]);
Route::get('admin_category_add',[
	'as'=>'admin_category_add',
	'uses'=>'AdminController@adminCategoryAdd'
]);
Route::post('category_add',[
	'as'=>'category_add',
	'uses'=>'AdminController@categoryAdd'
]);
Route::get('admin_category_edit/{id}',[
	'as'=>'admin_category_edit',
	'uses'=>'AdminController@adminCategoryEdit'
]);
Route::post('category_update/{id}',[
	'as'=>'category_update',
	'uses'=>'AdminController@categoryUpdate'
]);
Route::get('admin_category_delete/{id}',[
	'as'=>'admin_category_delete',
	'uses'=>'AdminController@categoryDelete'
]);




Route::get('admin_customer',[
	'as'=>'admin_customer',
	'uses'=>'AdminController@adminCustomer'
]);



Route::get('admin_users',[
	'as'=>'admin_users',
	'uses'=>'AdminController@adminUsers'
]);
Route::get('admin_users_add',[
	'as'=>'admin_users_add',
	'uses'=>'AdminController@adminUserAdd'
]);
Route::post('users_add',[
	'as'=>'users_add',
	'uses'=>'AdminController@userAdd'
]);
Route::get('pass_reset/{id}',[
	'as'=>'pass_reset',
	'uses'=>'AdminController@passwordReset'
]);
Route::get('admin_users_delete/{id}',[
	'as'=>'admin_users_delete',
	'uses'=>'AdminController@userDelete'
]);








Route::get('slides',[
	'as'=>'slides',
	'uses'=>'AdminController@slides'
]);
Route::post('postUpload',[
	'as'=>'postUpload',
	'uses'=>'AdminController@postUploadNew'
]);
Route::post('postUploadUpdate/{id}',[
	'as'=>'postUploadUpdate',
	'uses'=>'AdminController@postUploadUpdate'
]);
Route::get('slideDelete/{id}',[
	'as'=>'slideDelete',
	'uses'=>'AdminController@slideDelete'
]);



Route::get('print_order/{id}',[
	'as'=>'print_order',
	'uses'=>'AdminController@print_order'
]);

