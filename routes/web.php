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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });


    /* RESOURCEs Routes */
    Route::resource('users','UserController');
    Route::resource('roles','RoleController');

    /*------------------ RESOURCE'S ROUTES ------------------*/
    Route::get('/permissions','PermissionController@index');
    Route::get('/permissions/assign','PermissionController@assign');
    Route::get('/permissions/unassign','PermissionController@unassign');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
