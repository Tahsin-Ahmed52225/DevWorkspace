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

Auth::routes();

//Super Admin Route

Route::match(['get','post'],'/sadmin-login','sadmintdgController@sadmin_login')->name('sadminLogin');

Route::prefix('sadmin')->name('sadmin.')->middleware('auth')->group(function(){
    Route::match(['get','post'],'/dashboard','sadmintdgController@dashboard')->name('dashboard');
    Route::get('/logout','sadmintdgController@logout')->name('logout');
    Route::match(['get','post'],'/add-member','sadmintdgController@addMember')->name('addMember');
});




Route::get('/home', 'HomeController@index')->name('home');
