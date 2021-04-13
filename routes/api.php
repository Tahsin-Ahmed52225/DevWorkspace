<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function () {
    return User::all()->toJson();
});
Route::middleware('auth:api')->group(function () {
    Route::get('notifications/{notification}/', 'NotificationController@Getnotify');
    Route::post('create/{project::project}/notify', 'NotificationController@Postnotify');
});
