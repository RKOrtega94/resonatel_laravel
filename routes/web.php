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

//DB::listen(function ($query) {
//    echo "<pre>{$query->sql}</pre>";
//});

// Redirect to home page

use App\Http\Controllers\DataBitacoraController;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes([
    'register' => false
]);

//Home Page
Route::get('home', 'HomeController@index')->name('home')->middleware(['auth', 'profile']);

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

Route::middleware(['auth'])->group(function () {

    // Route For users
    Route::resource('user', 'UserController');

    // Route for menus
    Route::resource('menu', 'MenuController');

    // Route for Profiles
    Route::resource('profiles', 'RolController');

    // Route for Archived Users
    Route::resource('archivedusers', 'ArchivedUserController');

    // Route for Archived Profiles
    Route::resource('archivedprofiles', 'ArchivedProfileController');

    // Route for Archived Menus
    Route::resource('archivedmenus', 'ArchivedMenuController');

    // Bitácora controller
    Route::resource('bitacora', 'BitacoraController');

    // Data controller
    Route::resource('data/bitacoras', 'DataController');

    Route::resource('indicators', 'IndicatorController');

    // Indicator By User Controller
    Route::resource('indicator', 'IndicatorUserController');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    // Get all data from group
    Route::get('data/{campana}', 'DataBitacoraController@getAll');

    // Get all data from group by date
    Route::get('data/{campana}/{start}/{end}', 'DataBitacoraController@getAllByDate');

    Route::get('menu/sortable/{id}/{sorting}', 'SortableController@sortable');

    // Delete Menu
    Route::get('menu/remove/{id}', 'MenuController@delete')->name('menu.remove');

    Route::resource('elearning/admin', 'AdminElearningController');

    Route::resource('vt', 'VisitasTecnicasController');
});
