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
// Login
        // Get
Route::get('/', 'LoginController@getLogin')->name('login');
        // Post
Route::post('/login', 'LoginController@postLogin');


Route::group(['middleware' => 'auth'], function () {
    // Auth
        // Get
    Route::get('/logout', 'LoginController@getLogout')->name('logout');
    // Admin
        // Get
    Route::get('/admin', 'TransaksiController@index')->name('admin');
    // Kategori
        // Resource
    // Route::resource('kategori', 'KategoriController',[
    // 	'except' => 'show'
    // ]);
    // Produk
        // Get
    Route::get('produk', 'ProdukController@index')->name('produk.index');
    Route::get('produk/{id}', 'ProdukController@show');
    Route::get('readProduk', 'ProdukController@readProduk');
        // Post
    Route::post('createproduk', 'ProdukController@createProduk');
    Route::post('editproduk', 'ProdukController@editproduk');
    Route::post('createstockProduk', 'ProdukController@createstockProduk');
    Route::post('editstockProduk', 'ProdukController@editstockproduk');
        // Delete
    Route::delete('detailproduk/delete/{id}', 'ProdukController@deletestockProduk');
    // User
    Route::resource('user', 'UserController',[
    	'except' => 'show'
    ]);
        // Get
    Route::get('user/profile', 'UserController@pageUserProfile')->name('profile');
    Route::get('user/activities', 'UserController@pageActivities')->name('activities');
    Route::get('user/deleteall', 'UserController@deleteActivities');
        // Post
    Route::post('user/profile', 'UserController@postUpdateProfile')->name('update-profile');
    Route::post('user/password-change','UserController@postHandlePasswordChange')->name('change-password');
    // Customer
        // Get
    Route::get('customer', 'CustomerController@index')->name('customer.index');
    Route::get('customer/{id}', 'CustomerController@show')->name('customer.show');
    Route::get('customer/invoice/{id}', 'CustomerController@getInvoice')->name('customer.invoice');
    Route::get('readCustomer', 'CustomerController@readCustomer');
    Route::get('customer/get-customer', 'CustomerController@getCustomer');
    Route::get('customer/produk/{id}', 'CustomerController@getPrice');
        // Put
    Route::put('customer/active/{customer}', 'CustomerController@getActive');
    // Excel Customer
        // Get
    Route::get('download/customer/{type}', 'CustomerController@exportExcel');
        // Post 
    Route::post('import/customer', 'CustomerController@importExcel');
    Route::post ('createcustomer', 'CustomerController@addCustomer' )->name('customer.add');
    Route::post ('customer/edit', 'CustomerController@editCustomer' );
    Route::post('editcustomer', 'CustomerController@editCustomer');
        // Delete
    Route::delete('customer/delete/{id}', 'CustomerController@deleteCustomer');
    // Transaksi
        // Get
    Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::get('transaksi/create', 'TransaksiController@create')->name('transaksi.create');
    Route::get('transaksi/get-customer', 'TransaksiController@getCustomer');
        // Report
    Route::get('transaksi/daily', 'TransaksiController@getDay')->name('transaksidaily');
    Route::get('download/transaksi/harian/{type}', 'TransaksiController@exportDayExcel');
    Route::get('pdf/harian', 'TransaksiController@getDayPdf')->name('pdfharian');
    Route::get('transaksi/month', 'TransaksiController@getMonth')->name('transaksireport');
    Route::get('download/transaksi/bulanan/{type}', 'TransaksiController@exportMonthExcel');
    Route::get('pdf/bulanan', 'TransaksiController@getMonthPdf')->name('pdfbulanan');
        // Post
    Route::post('createorder', 'TransaksiController@addOrder' )->name('order.add');
    Route::post ('transcreatecustomer', 'TransaksiController@addTransCustomer' )->name('transcustomer.add');
        // Put
    Route::put('otworder/{pesanan}', 'TransaksiController@getOtw');
    Route::put('doneorder/{pesanan}', 'TransaksiController@getDone');
});

// Route::group(['prefix' => 'api/'], function() {
//     Route::resource('invoice', 'InvoiceController');
// });

