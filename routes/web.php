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
})->name('welcome');

// Auth::routes();

//Site Routes
Route::match(['get', 'post'], '/login', 'tdg_siteController@login')->name('Login');
Route::get('/logout', 'tdg_siteController@logout')->name('logout');

//Notification Route
Route::prefix('notification')->name('notify.')->middleware(['auth'])->group(function () {
    Route::get('/get', 'NotificationController@Getnotify')->name('get');
});



//Super Admin Route

Route::match(['get', 'post'], '/sadmin-login', 'sadmintdgController@sadmin_login')->middleware(['guest'])->name('sadminLogin');


Route::prefix('sadmin')->name('sadmin.')->middleware(['auth', 'admin'])->group(function () {

    Route::match(['get', 'post'], '/dashboard', 'sadmintdgController@dashboard')->name('dashboard');
    Route::match(['get', 'post'], '/add-member', 'sadmintdgController@addMember')->name('addMember');
    Route::get('/viewMember', 'sadmintdgController@viewMember')->name('viewMember');
    Route::match(['get', 'post'], '/timesheet', 'sadmintdgController@timesheet')->name('timesheet');
});

//TDG member Route
Route::prefix('tdg')->name('tdg.')->middleware(['auth', 'member'])->group(function () {
    Route::match(['get', 'post'], '/dashboard', 'tdg_memberController@dashboard')->name('dashboard');
    Route::match(['get', 'post'], '/dashboard/timer', 'tdg_memberController@timeTraker')->name('timer');
    Route::match(['get', 'post'], '/profile', 'tdg_memberController@profile')->name('profile');
    Route::match(['get', 'post'], '/timesheet', 'tdg_memberController@timesheet')->name('timesheet');
    Route::match(['get', 'post'], '/projects', 'tdg_memberController@projects')->name('projects');
    Route::get('/downaloadProjectFile/{id}', 'tdg_memberController@downloadfile')->name('downloadFile');
    Route::get('/projectStagechange', 'tdg_memberController@changeStage')->name('changeStage');
});
//TDG manager Route
Route::prefix('tdg-manager')->name('tdg-manager.')->middleware(['auth', 'manager'])->group(function () {
    Route::match(['get', 'post'], '/dashboard', 'tdg_managerController@dashboard')->name('dashboard');
    Route::match(['get', 'post'], '/dashboard/timer', 'tdg_managerController@timeTraker')->name('timer');
    Route::match(['get', 'post'], '/profile', 'tdg_managerController@profile')->name('profile');
    Route::match(['get', 'post'], '/timesheet', 'tdg_managerController@timesheet')->name('timesheet');
    Route::match(['get', 'post'], '/add-project', 'tdg_managerController@addProject')->name('addProject');
    Route::get('/getdepartment-person', 'tdg_managerController@getdepartmentPerson');
});


// Route::get('/home', 'HomeController@index')->name('home');
