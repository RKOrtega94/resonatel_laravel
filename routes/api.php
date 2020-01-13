<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

//use DataTables;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data/{user}', function (Request $request, User $user) {
    $data = [];

    $inp = file_get_contents('../public/data/baf.json');
    $array = json_decode($inp, true);

    foreach ($array as $value) {
        if ($value['user'] == $user->user) {
            $data = array_merge($data, [$value]);
        }
    }

    return DataTables::of($data)->toJson();
});

Route::get('group/{group}', function (Request $request, $group) {

    $data = [];

    $inp = file_get_contents('../public/data/baf.json');
    $array = json_decode($inp, true);

    foreach ($array as $value) {
        $data = array_merge($data, [$value]);
    }

    return DataTables::of($data)->toJson();
});
