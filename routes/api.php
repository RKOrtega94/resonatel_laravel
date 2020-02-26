<?php

use App\BitacoraFirebase;
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

Route::get('data/baf/{user}', function (Request $request, User $user) {
    $data = [];

    $database = BitacoraFirebase::firebaseConnection();

    try {
        $tickets = $database->getReference("baf/ticket")->orderByChild("user")->equalTo("$user->user")->getSnapshot();
        $data = $tickets;
        return DataTables::of($data->getValue())->toJson();
    } catch (Exception $e) {
        return $e;
    }
});

Route::get('data/chat/{user}', function (Request $request, User $user) {
    $data = [];

    $database = BitacoraFirebase::firebaseConnection();

    try {
        $tickets = $database->getReference("chat/ticket")->orderByChild("user")->equalTo("$user->user")->getSnapshot();
        $data = $tickets;
        return DataTables::of($data->getValue())->toJson();
    } catch (Exception $e) {
        return $e;
    }
});

Route::get('data/baf/daily/{user}', function (Request $request, User $user) {
    $data = [];

    $database = BitacoraFirebase::firebaseConnection();

    try {
        $tickets = $database->getReference("baf/ticket")->orderByChild("user")->equalTo("$user->user");
        $data = $tickets;
        return DataTables::of($data->getValue())->toJson();
    } catch (Exception $e) {
        return $e;
    }
});

Route::get('data/chat/daily/{user}', function (Request $request, User $user) {
    $data = [];

    $database = BitacoraFirebase::firebaseConnection();

    try {
        $tickets = $database->getReference("chat/ticket")->orderByChild("user")->equalTo("$user->user");
        $data = $tickets;
        return DataTables::of($data->getValue())->toJson();
    } catch (Exception $e) {
        return $e;
    }
});

Route::get('group/{group}', function (Request $request, $group) {

    $database = BitacoraFirebase::firebaseConnection();

    $data = [];

    $data = $database->getReference("tickets/$group")->getSnapshot()->getValue();

    return DataTables::of($data)->toJson();
});

Route::resource('indicators', 'ApiIndicatorsController');

Route::get('test', function () {
    return 'ok';
});
