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
Route::get('/ManagePaiement',['uses'=>'PaieController@managePaie']);
Route::get('/getbuys', 'PaieController@getBuys');
Route::put('/deletebuy', 'PaieController@dell');
Route::put('/paidbuy', 'PaieController@paid');


Route::get('/',['uses'=>'HomeController@manageHome']);
Route::get('/gethomeevents', 'HomeController@getEvents');
Route::get('/gethomeeventss', 'HomeController@getEventss');
Route::get('/gethomeeventscar1', 'HomeController@getEventscar1');
Route::get('/gethomeeventscar2', 'HomeController@getEventscar2');
Route::get('/getauthname', 'HomeController@getAuthname');
Route::get('/getsession', 'HomeController@getSessions');
Route::post('/bQgt', 'HomeController@GhTy');
Route::put('/jYgP', 'HomeController@PYhK');
Route::put('/sessionadd', 'HomeController@addItems');
Route::get('/mailsent', 'HomeController@mailSent');
Route::put('/addclic', 'HomeController@addClic');
Route::put('/sendmail', 'HomeController@sendMail');

Route::get('/dashboard',['uses'=>'EventController@manageEvent']);
Route::get('/getsellers',['uses'=>'EventController@getSellers']);
Route::get('/secreturl',['uses'=>'EventController@getUsers']);
Route::get('/tikiyass',['uses'=>'EventController@getTikiyas']);
Route::get('/getcategories',['uses'=>'EventController@getCategories']);
Route::post('/addevent', 'EventController@addEvent');
Route::put('/deleteevent', 'EventController@deleteEvent');
Route::put('/mPijh', 'EventController@valTikiya');
Route::put('/validevent', 'EventController@validEvent');
Route::put('/checktikiya', 'EventController@checkTikiya');
Route::put('/changecar', 'EventController@changecaroussel');
Route::post('/logout', 'EventController@flushSession');
Route::post('/maketikiya', 'EventController@Maketikia');
Route::get('/showtikiya', 'EventController@showTikiya');

Route::get('qrcode', function () {
     return QrCode::size(300)
                     ->backgroundColor(255,55,0)
                     ->generate('A simple example of QR code');
 });



Route::put('/changenom', 'EventController@changeName');
Route::put('/changephoto', 'EventController@changePhoto');
Route::put('/changeprenom', 'EventController@changePrenom');
Route::put('/changeemail', 'EventController@changeEmail');
Route::put('/changemenu', 'EventController@changeMenu');
Route::put('/changeseller', 'EventController@changeSeller');


Route::get('/acc', 'HomeController@accepted');
Route::post('/lYjDD', 'HomeController@lYjDD');
Route::post('/seend', 'HomeController@seend');
Route::get('/send/forward', 'HomeController@forward');
Route::get('/send/forward_data', 'FpayPackage@sendData');


Route::get('/receive','HomeController@Receive');
Route::get('/receivee','HomeController@Receive2');


Route::get('/getevents', 'EventController@getEvents');
Route::get('/getbuysevent', 'EventController@getBuys');
Route::get('/getsumbuysevent', 'EventController@getsumBuys');
Route::get('/getsumbuysevent2', 'EventController@getsumBuys2');
Route::get('/getnotbuysevent', 'EventController@getnotBuys');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
