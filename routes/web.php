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
    return view('home');
});

Route::get('/customers/','CustomersController@index')->name('customers.index');
Route::get('/customer/create','CustomersController@create')->name('customers.create');
Route::post('/customer/store','CustomersController@store')->name('customers.store');
Route::get('/customer/{customer}','CustomersController@show')->name('customers.show')->middleware('can:view,customer');
Route::get('/customer/{customer}/edit','CustomersController@edit')->name('customers.edit');
Route::patch('/customer/{customer}/','CustomersController@update')->name('customers.update');
Route::delete('/customer/{customer}/','CustomersController@destroy')->name('customers.destroy');
//Route::resource('/customers','CustomersController');

// Contact Routes
Route::get('/contacts','ContactController@create')->name('contact.create');
Route::post('/contacts/store','ContactController@store')->name('contact.store');




Route::view('/about','about')->name('about');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
