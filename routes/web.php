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
Auth::routes([
    'register' => false
]);

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

View::share('test', 'test');


Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
});

Route::get('403', ['as' => 'helpers.403', 'uses' => 'ForbiddenController@index']);

Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::delete('user/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
    Route::get('user/edit', ['as' => 'user.edit', 'uses' => 'UserCOntroller@edit']);
    Route::post('user', ['as' => 'user.store', 'uses' => 'UserController@store']);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('navigation', ['as' => 'navigation.index', 'uses' => 'NavigationController@index']);
    Route::resource('roles', 'RolController', ['except' => ['show']]);
});
