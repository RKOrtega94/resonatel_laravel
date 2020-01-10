<?php

use App\BitacoraFirebase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Facades\DataTables;

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

Route::get('data/mensual/{user}', function (Request $request, User $user) {

    $year = date('Y');
    $month = date('m');

    $ruta = Route::getCurrentRoute()->getName();

    //return $user->user;
    // Define connection
    $database = BitacoraFirebase::firebaseConnection();

    // References
    $ticketReference = [];
    $ticketData = [];

    // Getting reference
    $data = $database->getReference("tickets/baf/$year/$month");

    // Get day reference
    foreach ($data->getChildKeys() as $day) {
        $users = $database->getReference("tickets/baf/$year/$month/$day");
        foreach ($users->getChildKeys() as $userref) {
            if ($userref == $user->user) {
                $tickets = $database->getReference("tickets/baf/$year/$month/$day/$userref");
                $ticketData = array_merge($ticketData, $tickets->getValue());
                //foreach ($tickets->getChildKeys() as $ticket) {
                //    $registros = $database->getReference("tickets/baf/$year/$month/$day/$userref/$ticket");
                //    $ticketData = array_merge($ticketData, $registros->getValue());
                //}
            }
        }
    }

    //return $data->getValue();
    return DataTables::collection($ticketData)->toJson();
    //if ($request->ajax()) {
    //    $data = Menu::latest()->get();
    //    return DataTables::of($data)->toJson();
    //}
});
