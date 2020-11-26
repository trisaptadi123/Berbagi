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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PostCategoryController@index');
Route::get('semuadonasi','PostCategoryController@semuadonasi');
Route::get('email_template','PostCategoryController@mail');
Route::post('zakat-profesi','PostCategoryController@zakatprof');
Route::post('zakat-simpanan','PostCategoryController@zakatsimpan');
Route::post('zakat-emas','PostCategoryController@zakatemas');
Route::post('zakat-perdagangan','PostCategoryController@zakatdagang');
Route::get('bayarzakat','PostCategoryController@bayarzakat');
Route::post('zakat','PostCategoryController@stored');


Route::get('/program/{post}','PostCategoryController@readmore')->name('program.detail');
Route::get('/donasi/{post}','PostCategoryController@rd')->name('donasi.detail');
// Route::post('/checkout/{post}','PostCategoryController@checkout');


Route::get('layouts/login', 'MainController@login');
Route::get('layouts/detail', 'MainController@detail');
Route::get('layouts/detail_cerita', 'MainController@detail_cerita');
Route::post('layouts/zakatnow', 'MainController@zakatnow');

// Route::get('semuadonasi', 'MainController@alldonate');
Route::get('zis', 'MainController@zis');

Route::get('menudonasi/donasinow', 'MainController@donasinow');
// Route::get('menudonasi/bayar', 'MainController@bayar');



Route::get('program/pendidikan', 'MainController@pendidikan');
Route::get('program/detail_pendidikan', 'MainController@detail_pendidikan');




Route::group(['middleware'=>['web']],function(){


    Auth::routes();
    
    Route::get('bayar','PostCategoryController@bayar');
    Route::post('bayar','PostCategoryController@store');
    Route::post('menudonasi/donasinow','PostCategoryController@buat');
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard','DashboardController@index');

    Route::get('bank','BankController@index');
    Route::get('bank/create','BankController@create');
    Route::post('bank','BankController@store');
    Route::get('bank/{bank}/edit','BankController@edit');
    Route::patch('bank/{bank}','BankController@update');
    Route::delete('bank/{bank}','BankController@destroy');

    Route::get('datadonatur','DonaturController@index');
    Route::get('datadonatur/create','DonaturController@create');
    Route::post('datadonatur','DonaturController@store');
    Route::get('datadonatur/{donatur}/edit','DonaturController@edit');
    Route::delete('datadonatur/{donatur}','DonaturController@destroy');
    Route::patch('datadonatur/{donatur}','DonaturController@update');
    Route::get('status/{donatur}','DonaturController@status');

    Route::get('slide','SlideController@index');
    Route::get('slide/create','SlideController@create');
    Route::post('slide','SlideController@store');
    Route::get('slide/{slide}/edit','SlideController@edit');
    Route::patch('slide/{slide}','SlideController@update');
    Route::delete('slide/{slide}','SlideController@destroy');

    Route::get('anak','AnakController@index');
    Route::get('anak/create','AnakController@create');
    Route::post('anak','AnakController@store');
    Route::delete('anak/{anak}','AnakController@destroy');


    Route::get('zakat','ZakatController@index');
    Route::get('zakat/create','ZakatController@create');
    Route::delete('zakatdel/{zakat}','ZakatController@destroy');
    Route::post('bayarzakat','ZakatController@stored');
    
  

    Route::get('post','PostController@index');
    Route::get('post/waktu/{post}','PostController@tampilan');
    Route::get('post/create','PostController@create');
    
    Route::post('post','PostController@store');
    Route::get('post/{post}','PostController@show');

    Route::get('postcategory','CategoryController@index');
    Route::post('postcategory','CategoryController@store');
    Route::get('postcategory/create','CategoryController@create');
    Route::get('postcategory/{category}/edit','CategoryController@edit');
    Route::delete('postcategory/{category}','CategoryController@destroy');
    Route::patch('postcategory/{category}','CategoryController@update');



Route::get('post/{post}/edit','PostController@edit');
Route::patch('post/{post}','PostController@update');

Route::delete('post/{post}','PostController@destroy');
});



