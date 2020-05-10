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



Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
		return redirect('beranda');
	});

	Route::get('item/export', 'Item_controller@export');

	Route::get('beranda', 'Beranda_controller@index');

	// Merk
	Route::get('merk', 'Merk_controller@index');
	Route::get('merk/add', 'Merk_controller@add');
	Route::post('merk/store', 'Merk_controller@store');
	Route::get('merk/edit/{id}', 'Merk_controller@edit');
	Route::put('merk/update/{id}', 'Merk_controller@update');
	Route::get('merk/delete/{id}', 'Merk_controller@delete');

	// Supplier
	Route::get('supplier', 'Supplier_controller@index');
	Route::get('supplier/add', 'Supplier_controller@add');
	Route::post('supplier/store', 'Supplier_controller@store');
	Route::get('supplier/edit/{id}', 'Supplier_controller@edit');
	Route::put('supplier/update/{id}', 'Supplier_controller@update');
	Route::get('supplier/delete/{id}', 'Supplier_controller@delete');

	// Kategori
	Route::get('kategori', 'Kategori_controller@index');
	Route::get('kategori/add', 'Kategori_controller@add');
	Route::post('kategori/store', 'Kategori_controller@store');
	Route::get('kategori/edit/{id}', 'Kategori_controller@edit');
	Route::put('kategori/update/{id}', 'Kategori_controller@update');
	Route::get('kategori/delete/{id}', 'Kategori_controller@delete');

	// Item
	Route::get('item', 'Item_controller@index');
	Route::get('item/add', 'Item_controller@add');
	Route::post('item/store', 'Item_controller@store');
	Route::get('item/edit/{id}', 'Item_controller@edit');
	Route::put('item/update/{id}', 'Item_controller@update');
	Route::get('item/delete/{id}', 'Item_controller@delete');
});

Auth::routes();

Route::get('keluar', function () {
	\Auth::logout();
	return redirect('login');
});
