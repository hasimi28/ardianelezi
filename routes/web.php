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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin', 'Admin\AdmController@dashboard');

Auth::routes();

Route::prefix('backend')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function(){

Route::get('/','Admin\AdmController@dashboard');
Route::resource('/users','Admin\UserController');
Route::get('/dashboard','Admin\AdmController@dashboard')->name('backend.dashboard');
Route::resource('/permissions', 'Admin\PermissionController', ['except' => 'destroy']);
Route::resource('/roles', 'Admin\RoleController', ['except' => 'destroy']);

});


Route::get('/home', 'HomeController@index')->name('home');
