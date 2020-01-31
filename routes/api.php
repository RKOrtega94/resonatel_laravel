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

    $inp = file_get_contents('../public/data/baf.json');
    $array = json_decode($inp, true);

    foreach ($array as $value) {
        if ($value['user'] == $user->user) {
            $data = array_merge($data, [$value]);
        }
    }

    return DataTables::of($data)->toJson();
});

Route::get('data/baf/daily/{user}', function (Request $request, User $user) {
    $data = [];

    $year = now()->format('Y');
    $month = now()->format('m');
    $day = now()->format('d');

    $database = BitacoraFirebase::firebaseConnection();

    $username = $user->user;

    try {
        $tickets = $database->getReference("tickets/baf/$year/$month/$day/$username");
        foreach ($tickets->getChildKeys() as $ticket) {
            $values = $database->getReference("tickets/baf/$year/$month/$day/$username/$ticket");
            //$values->update([
            //    'user' => $username
            //]);
            array_push($data, $values->getValue());
        }
        return DataTables::of($data)->toJson();
    } catch (Exception $e) {
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
