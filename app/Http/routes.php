<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');

});



Route::auth();

Route::get('/home', 'HomeController@index');

//admin dashboard page

Route::group(['middleware' => 'admin'], function (){


    Route::get('/admin', function (){
        return view('admin.index');
    });


    Route::get('admin/users/index', 'AdminUserController@index');

    //open user creating form
    Route::get('/admin/users/create', 'AdminUserController@create');
    //using post method to store record to database
    Route::post('/createUserForm', 'AdminUserController@store');


    //get data from edit form
    Route::get('/admin/users/edit/{id}', 'AdminUserController@edit');
    //updated recrods from table
    Route::patch('/updateUserForm/{id}', 'AdminUserController@update');


    //delete recrods from table
   Route::delete('/deleteUser/{id}', 'AdminUserController@destroy');


});



