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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'], function() {
	Route::get('','AdminController@index')->name('admin_index');
	// brand
	Route::get('/brand.html','BrandController@index')->name('brand_index');	
	Route::post('brand/add-brand','BrandController@post_add')->name('brand_add');
	Route::get('brand/{id}','BrandController@delete')->name('brand_del');
	Route::post('brand/update-brand','BrandController@update')->name('brand_update');
	//category
	Route::get('/category.html','CategoryController@index')->name('category_index');
	Route::post('category/add-category','CategoryController@post_add')->name('category_add');
	Route::get('category/{id}','CategoryController@delete')->name('category_del');
	Route::post('category/update-category','CategoryController@update')->name('category_update');
	//product
	Route::get('/product.html','ProductController@index')->name('product_index');
	Route::get('product/add','ProductController@add')->name('product_add');
	Route::post('product/add','ProductController@post_add')->name('product_add');
	Route::get('product/{id}','ProductController@delete')->name('product_del');
	Route::get('product/update/{id}','ProductController@update')->name('product_update');
	Route::post('product/update/{id}','ProductController@update')->name('product_update');
	//admin
	Route::get('/admin.html','AdminController@list')->name('admin_list');
	Route::get('add-admin','AdminController@add')->name('admin_add');
	Route::post('add-admin','AdminController@post_add')->name('admin_add');
	Route::get('admin/{id}','AdminController@delete')->name('admin_del');
	Route::get('admin-logout','AdminController@logout')->name('admin_logout');
	Route::get('admin/update/{id}','AdminController@update')->name('admin_update');
	Route::post('admin/update/{id}','AdminController@update')->name('admin_update');
	Route::get('admin/password/{id}','AdminController@password')->name('admin_password');
	Route::post('admin/password/{id}','AdminController@password')->name('admin_password');
});
Route::get('admin/login','Admin\AdminController@login')->name('login');
Route::post('admin/login','Admin\AdminController@post_login')->name('login');
Route::get('admin/forgot-password','Admin\AdminController@forgot')->name('forgot_password');
Route::get('admin/get_pass_admin?token={token}','Admin\AdminController@new_pass')->name('get_pass_admin');