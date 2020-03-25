<?php

use App\Http\Controllers\HomeController;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','HomeController@index')->name('home');
Route::resource('item','ItemController');

Route::get('item/request/create','ItemController@createItemRequest')->name('create-request-item');
Route::post('item/request/store','ItemController@storeRequestItem')->name('requestitemstore');

Route::get('success/{id}','ItemController@success')->name('item.success');
Route::get('removed/{id}','ItemController@deactivated')->name('item.deactivated');

Route::get('search','HomeController@search')->name('search');
Route::get('search/refine','HomeController@refine')->name('refine-search');
Route::get('search/help/local','HomeController@helplocal')->name('helplocal');


Route::get('deactivate/{item}','ItemController@destroy')->name('deactivate')->middleware('signed');
Route::get('howitworks','HomeController@howitworks')->name('howitworks');
Route::get('terms','HomeController@terms')->name('terms');
Route::get('contact','HomeController@contact')->name('contact');
Route::post('contactusSend','HomeController@contactSend')->name('contactusSend');


