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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    // Route::get(['users/{id}', 'UserController@show'])->name('users.show');
    //Route::post('users/create', 'UserController@create')->name('users.create')->middleware('checkadmin');

    Route::resource('users', 'UserController');
    // Route::post('users/create', 'UserController@create')->name('users.create')->middleware('checkadmin');

    Route::resource('roles', 'RoleController')->middleware('checkadmin');
    Route::get('companies/uploadimage/{id?}', 'CompanyController@uploadgetimage')->name('companies.uploadimage');
    Route::post('companies/uploadimage', 'CompanyController@uploadimage')->name('companies.uploadimage')->middleware('checkadmin');
    Route::resource('companies', 'CompanyController')->middleware('checkadmin');
    Route::get('users.updatepassword', 'UserController@updatepassword')->name('users.updatepassword');
    //Route::match(['put', 'patch'], '/users/updatepassword/{id}', 'UserController@updatedpassword');
    Route::post('users.updatepassword', 'UserController@updatedpassword')->name('users.updatepassword');
    Route::resource('empolyees', 'EmpolyeeController')->middleware('checkadmin');

    Route::resource('companies', 'CompanyController')->middleware('checkadmin');

    //Route::POST('companies/store', 'CompanyController@store')->name('companies.store');
    //Route::get('logo' , 'CompaniesController@uploadfile');
});

// Route::resource('roles', 'RoleController');

// Route::resource('users', 'UserController');
