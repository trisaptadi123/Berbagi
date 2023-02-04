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

Route::get('berbagiinfo', 'BerbagiinfoController@index');
Route::post('berbagiinfo', 'BerbagiinfoController@load_data_artikel')->name('loadmore.load_data_artikel');
/*Route::get('/infoberbagi/{infoberbagi}','BerbagiinfoController@infoberbagi')->name('infoberbagi.detail');*/
Route::get('berbagiinfo/{kategori}','BerbagiinfoController@kategori');
Route::get('berbagiinfo/{kategori}/{deskripsi}','BerbagiinfoController@berbagiinfo');
Route::get('berbagiinfo-me/{kategori}/{deskripsi}','BerbagiinfoController@berbagiinfo_me');
Route::get('berbagiinfo-kategori/{kategori}','BerbagiinfoController@kategori_me');
Route::get('berbagiinfo-me/{nama}','BerbagiinfoController@infome');
Route::get('cariartikel','PostCategoryController@cariartikel');
Route::get('tag','PostCategoryController@tag');

Route::get('chart','HomeController@chart');

Route::get('/','PostCategoryController@index');
Route::get('semuadonasi','PostCategoryController@semuadonasi');
Route::get('filterah','PostCategoryController@filterah');
Route::post('semuadonasi', 'PostCategoryController@load_data_donasi')->name('loadmore.load_data_donasi');
Route::get('email_template','PostCategoryController@mail');
Route::get('zakat-profesi','PostCategoryController@zakatprof');
Route::get('zakat-simpanan','PostCategoryController@zakatsimpan');
Route::get('zakat-emas','PostCategoryController@zakatemas');
Route::get('zakat-perdagangan','PostCategoryController@zakatdagang');
Route::get('bayarzakat','PostCategoryController@bayarzakat');
Route::post('zakat','PostCategoryController@stored');
Route::get('pay-zakat/{id}','PostCategoryController@show');
Route::get('/download/{id}','PostCategoryController@download');

Route::get('status_zakat/{zakat}','ZakatController@status');

Route::get('cek_kab', 'PostCategoryController@cek_kab');
Route::get('prof', 'PostCategoryController@cek_prof');
Route::post('filter_tgl', 'PostCategoryController@filter_tgl');

Route::get('ramadhan', 'PostCategoryController@ramadhan');
Route::get('create/ramadhan', 'PostCategoryController@create_ramadhan');
Route::post('post/ramadhan', 'PostCategoryController@add_ramadhan');
Route::get('status_acc/{post}','PostCategoryController@status_acc');
Route::get('ramadhan/{post}/edit','PostCategoryController@edit_ramadhan');
Route::patch('ramadhan/{post}','PostCategoryController@update_ramadhan');
Route::delete('ramadhan/{post}','PostCategoryController@destroy_ramadhan');
Route::get('dataramadhan', 'PostCategoryController@data_ramadhan');
Route::get('statusrm/{qurban}','PostCategoryController@status_datarm');
Route::delete('dataramadhan/{qurban}','PostCategoryController@delete_datarm');
Route::get('statusmn/{coba}', 'PostCategoryController@statusmn');


Route::get('prog/{coba}', 'PostCategoryController@qurban');
Route::get('/prog/{coba}/{post}','PostCategoryController@read_qurban');
Route::get('/bayar/{coba}/{post}','PostCategoryController@pembayaran');
Route::post('bayarqurban','PostCategoryController@bayarqurban');
Route::get('bayarqurban', 'PostCategoryController@bayarqurbanview');
Route::get('qurban-pay/{id}','PostCategoryController@qurbanshow');


Route::get('auth/login','GoogleController@google');
Route::get('auth/login/callback','GoogleController@callback');

Route::get('buat-galang-dana','PostCategoryController@galang');
Route::post('new-galang-dana','PostCategoryController@storestir');

Route::get('metadata','PostCategoryController@metadata');

Route::get('bayar','PostCategoryController@bayar');
Route::post('bayar','PostCategoryController@store');
Route::post('menudonasi/donasinow','PostCategoryController@buat');
Route::get('donasi-pay/{id}','PostCategoryController@donaturshow');
Route::post('bayarfdn','PostCategoryController@storefundrais');
Route::get('bayarkan','PostCategoryController@bayarfdn');
Route::get('donate-pay/{id}','PostCategoryController@donaturfdnshow');

Route::get('menudonasi/{post}', 'PostCategoryController@anak_asuh');
Route::post('bayaranakasuh', 'PostCategoryController@bayar_anakasuh');
Route::get('bayaranakasuh', 'PostCategoryController@bayar_anakshow');
Route::get('anakasuh/{id}', 'PostCategoryController@donatur_anak');
Route::get('anakasuh-pay/{id}', 'PostCategoryController@anakasuh_pay');


Route::get('cari','PostCategoryController@cari');
Route::get('filter', 'PostCategoryController@filter');

Route::get('disclaimer', 'PostCategoryController@disclaimer');
Route::get('disclaimer/{id}/edit', 'PostCategoryController@edit_disclaimer');
Route::post('disclaimer/{id}/edit', 'PostCategoryController@update_disclaimer');


Route::get('pencairandana/{judul}/{id}','PostCategoryController@pencairan');
Route::post('cairdana','PostCategoryController@cairdana');
Route::get('newinfo','PostCategoryController@newinfo');
Route::get('editgalangdana/{post}/edit','PostCategoryController@editgalang');
Route::patch('editgalangdana/{post}','PostCategoryController@updategalang');
Route::get('hapus_info/{id}', 'PostCategoryController@hapus_info');

Route::get('akun','PostCategoryController@editprof');
Route::get('edituser/{edituser}/edit','PostCategoryController@editusers');
Route::patch('edituser/{edituser}','PostCategoryController@updateusr');
Route::get('editpass','PostCategoryController@editpass');
Route::post('editpass','PostCategoryController@updatepass');

Route::get('/galangdanaku/{post}','PostCategoryController@showgalangdana')->name('galangdana.detail');
Route::get('/program/{post}','PostCategoryController@readmore')->name('program.detail');
Route::post('/program', 'PostCategoryController@load_data_donatur')->name('loadmore.load_data_donatur');
Route::get('/donasi/{post}','PostCategoryController@rd')->name('donasi.detail');
Route::get('/programs/{anak}','PostCategoryController@readanak')->name('programs.detail');
Route::get('/cerita/{kabar}','PostCategoryController@kabarbaiks')->name('cerita.detail');
Route::get('/fundraiser/{post}','PostCategoryController@fundraiser')->name('fundraiser.detail');
Route::get('/programfundraiser/{fdn}','PostCategoryController@fdn')->name('programfdn.detail');
Route::get('/donasii/{fd}','PostCategoryController@donasifdn')->name('fdndonasi.detail');


Route::get('layouts/login', 'MainController@login');
Route::get('layouts/detail', 'MainController@detail');
// Route::get('layouts/semuaanakasuh', 'MainController@semuaanakasuh');
Route::get('layouts/detail_cerita', 'MainController@detail_cerita');
Route::post('layouts/zakatnow', 'MainController@zakatnow');
Route::get('layouts/semuaanakasuh', 'PostCategoryController@semuaanakasuh');
Route::post('layouts/semuaanakasuh', 'PostCategoryController@load_data')->name('loadmore.load_data');

// Route::get('semuadonasi', 'MainController@alldonate');
Route::get('zis', 'MainController@zis');

Route::get('menudonasi/donasinow', 'MainController@donasinow');
// Route::get('menudonasi/bayar', 'MainController@bayar');



Route::get('program/pendidikan', 'MainController@pendidikan');
Route::get('program/detail_pendidikan', 'MainController@detail_pendidikan');



Route::get('user/detail_cam', 'MainController@detail_cam');
Route::get('user/edit_cam', 'MainController@edit_cam');
Route::get('user/info_cam', 'MainController@info_cam');
Route::get('user/pencairan', 'MainController@pencairan');
// Route::get('user/edit_profil', 'MainController@edit_profil');



Route::group(['middleware'=>['web']],function(){
    Auth::routes(['ceklevel' => true]);
     Route::get('/home', 'HomeController@index')->name('home')->middleware('ceklevel');
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
    Route::get('anak/{anak}/edit','AnakController@edit');
    Route::post('anak/{anak}','AnakController@update');
    Route::delete('anak/{anak}','AnakController@destroy');

    Route::get('kabarbaik','KabarbaikController@index');
    Route::get('kabarbaik/create','KabarbaikController@create');
    Route::post('kabarbaik','KabarbaikController@store');
    Route::get('kabarbaik/{kabarbaik}/edit','KabarbaikController@edit');
    Route::patch('kabarbaik/{kabarbaik}','KabarbaikController@update');
    Route::delete('kabarbaik/{kabarbaik}','KabarbaikController@destroy');
    
    Route::get('/infoterbaru/{post}','PostCategoryController@newinfo')->name('newinfo.detail');
    Route::post('sukainfo','PostCategoryController@storeinfo');
    Route::get('editinfo/{info}/edit','PostCategoryController@editinfos');
    Route::patch('editinfo/{info}','PostCategoryController@updateinfos');
    
    


    Route::get('zakat','ZakatController@index');
    Route::get('zakat/create','ZakatController@create');
    Route::delete('zakatdel/{zakat}','ZakatController@destroy');
    Route::post('bayarzakat','ZakatController@stored');
    Route::get('zakatshow/{zakat}','ZakatController@show');
    
  

    Route::get('post','PostController@index');
    Route::get('post/waktu/{post}','PostController@tampilan');
    Route::get('post/create','PostController@create');
    
    Route::post('post','PostController@store');
    Route::get('post/{post}','PostController@show');
    Route::get('statused/{post}','PostController@statused');
    Route::get('ketubah/{post}','PostController@ketubah');
    Route::get('ketubahs/{post}','PostController@ketubahs');

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

Route::group(['middleware'=>['auth','ceklevel:admin,campaign,keuangan']],function(){
    
     Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard','DashboardController@index');
    
    Route::get('unggulan', 'PostCategoryController@unggulan');
    Route::post('unggulan', 'PostCategoryController@post_unggulan');
    Route::get('hapusunggulan/{id}', 'PostCategoryController@hapus_unggulan');

    Route::get('utama', 'PostCategoryController@utama');
    Route::post('utama', 'PostCategoryController@post_utama');
    Route::get('hapusutama/{id}', 'PostCategoryController@hapus_utama');

    Route::get('allakun','PostCategoryController@semuauser');
    Route::get('tambahuser', 'PostCategoryController@tambahuser');
      Route::post('level', 'PostCategoryController@level');
    Route::post('tambahuser', 'PostCategoryController@adduser');
    Route::get('editusers/{editusers}/edit','PostCategoryController@rombakuser');
    Route::patch('editusers/{editusers}','PostCategoryController@rombakan');

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
    
    Route::get('datadonaturanak', 'DonaturController@donatur_anak');
    Route::get('status_anakasuh/{donatur}', 'DonaturController@status_anak');
    Route::delete('datadonaturanak/{donatur}', 'DonaturController@hapus_anak');

    Route::get('slide','SlideController@index');
    Route::get('slide/create','SlideController@create');
    Route::post('slide','SlideController@store');
    Route::get('slide/{slide}/edit','SlideController@edit');
    Route::patch('slide/{slide}','SlideController@update');
    Route::delete('slide/{slide}','SlideController@destroy');

    Route::get('anak','AnakController@index');
    Route::get('anak/create','AnakController@create');
    Route::post('anak','AnakController@store');
    Route::get('anak/{anak}/edit','AnakController@edit');
    Route::patch('anak/{anak}','AnakController@update');
    Route::delete('anak/{anak}','AnakController@destroy');
    Route::get('anak/statusanak/{anak}', 'AnakController@statusanak');

    Route::get('kabarbaik','KabarbaikController@index');
    Route::get('kabarbaik/create','KabarbaikController@create');
    Route::post('kabarbaik','KabarbaikController@store');
    Route::get('kabarbaik/{kabarbaik}/edit','KabarbaikController@edit');
    Route::patch('kabarbaik/{kabarbaik}','KabarbaikController@update');
    Route::delete('kabarbaik/{kabarbaik}','KabarbaikController@destroy');


    Route::get('zakat','ZakatController@index');
    Route::get('zakat/create','ZakatController@create');
    Route::delete('zakatdel/{zakat}','ZakatController@destroy');
    Route::post('bayarzakat','ZakatController@stored');
    Route::get('zakatshow/{zakat}','ZakatController@show');
    
  

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
    
    Route::post('fundra','PostCategoryController@storefdn');

    Route::get('posttag','TagController@index');
    Route::post('posttag','TagController@store');
    Route::get('posttag/create','TagController@create');
    Route::get('posttag/{tag}/edit','TagController@edit');
    Route::delete('posttag/{tag}','TagController@destroy');
    Route::patch('posttag/{tag}','TagController@update');
    

    Route::get('post/{post}/edit','PostController@edit');
    Route::patch('post/{post}','PostController@update');
    Route::delete('post/{post}','PostController@destroy');

    Route::get('fundraise','FundraiserController@index');
    Route::delete('fundraise/{fundraise}','FundraiserController@destroy');
    
    
    Route::get('donatefundraiser','DonatefundraiserController@index');
    Route::delete('donatefundraiser/{donatefundraiser}','DonatefundraiserController@destroy');
    Route::get('statusfdn/{donatefundraiser}','DonatefundraiserController@statusfdn');
    
    Route::get('info','InfoController@index');
    Route::get('inforamadhan','InfoController@inforamadhan');
    Route::get('/info/{post}','InfoController@create')->name('info.detail');
    Route::post('add_info','InfoController@store');
    Route::get('info/{info}/edit','InfoController@edit');
    Route::patch('info/{info}','InfoController@update');
    Route::delete('info/{info}','InfoController@destroy');
    Route::get('statusinf/{id}', 'InfoController@statusinf');
    
    Route::get('pencairan_dana', 'PostCategoryController@cair_dana');
    Route::get('statuscd/{id}','PostCategoryController@status_cd');
    Route::get('pencairan_dana/{id}', 'PostCategoryController@edit_cair');
    Route::post('pencairan_dana/{id}/edit', 'PostCategoryController@update_cairdana');
    Route::delete('hapus_dana/{id}', 'PostCategoryController@hapus_danas');
    
    Route::get('artikel','ArticleController@index');
    Route::get('artikel/create','ArticleController@create');
    Route::post('artikel','ArticleController@add');
    Route::delete('artikel/{artikel}','ArticleController@destroy');
    Route::get('artikel/{artikel}/edit','ArticleController@edit');
    Route::patch('artikel/{artikel}','ArticleController@update');
    Route::get('artikel/{artikel}/acc','ArticleController@acc');
    
    Route::post('artikel-user','BerbagiinfoController@add');

   
    
    
});


Auth::routes(['verify' => true]);
    Route::get('user','PostCategoryController@userr')->middleware('verified');
    Route::get('dashboarded','PostCategoryController@dashbor')->middleware('verified');
    Route::get('fundraiser','PostCategoryController@fundraiser')->middleware('verified');
    Route::get('galangdana','PostCategoryController@menu')->middleware('verified');
    Route::get('donasisaya','PostCategoryController@donasisaya')->middleware('verified');
    Route::get('qurbansaya', 'PostCategoryController@qurbansaya')->middleware('verified');
    Route::get('user/index', 'MainController@user')->middleware('verified');
    Route::get('user/campaign_saya', 'MainController@campaign_saya')->middleware('verified');
    Route::get('user/fundraiser', 'MainController@fundraiser')->middleware('verified');
    Route::get('user/donasi_saya', 'MainController@donasi_saya')->middleware('verified');
    Route::get('user/galang_dana', 'MainController@galang_dana')->middleware('verified');
    Route::get('user/edit_profil', 'MainController@edit_profil')->middleware('verified');
    
    Route::get('galangdana/semua','PostCategoryController@allgalang')->middleware('verified');
    Route::get('/allfundraiser','PostCategoryController@allfundraiser')->middleware('verified');
    
    Route::get('buat-info/{user}','BerbagiinfoController@buat_info')->middleware('verified');


Route::group(['middleware'=>['auth','ceklevel:user']],function(){
    // Route::get('fundraiser','PostCategoryController@fundraiser');
    //  Route::get('galangdana','PostCategoryController@menu');
    // Route::get('dashboarded','PostCategoryController@dashbor');
    // Route::get('donasisaya','PostCategoryController@donasisaya');
});



