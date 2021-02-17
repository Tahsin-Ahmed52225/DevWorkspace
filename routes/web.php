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

Route::match(['get','post'],'/sadmin-login','sadmintdgController@sadmin_login')->middleware(['guest'])->name('sadminLogin');

Route::prefix('sadmin')->name('sadmin.')->middleware(['auth','admin'])->group(function(){

    Route::match(['get','post'],'/dashboard','sadmintdgController@dashboard')->name('dashboard');
    Route::get('/logout','sadmintdgController@logout')->name('logout');
    Route::match(['get','post'],'/add-member','sadmintdgController@addMember')->name('addMember');
    Route::get('/viewMember','sadmintdgController@viewMember')->name('viewMember');
    Route::match(['get','post'],'/timesheet','sadmintdgController@timesheet')->name('timesheet');
});

//TDG member Route 

Route::match(['get','post'],'/login','tdg_memberController@login')->name('Login');
Route::prefix('tdg')->name('tdg.')->middleware(['auth','member'])->group(function(){
    Route::match(['get','post'],'/dashboard','tdg_memberController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/dashboard/timer','tdg_memberController@timeTraker')->name('timer');
    Route::match(['get','post'],'/profile','tdg_memberController@profile')->name('profile');
    Route::match(['get','post'],'/timesheet','tdg_memberController@timesheet')->name('timesheet');

  
});


Route::get('/home', 'HomeController@index')->name('home');
