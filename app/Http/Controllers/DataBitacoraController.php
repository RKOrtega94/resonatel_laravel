<?php

namespace App\Http\Controllers;

use App\BitacoraFirebase;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataBitacoraController extends Controller
{
    public function getAll($campania)
    {
        $data = [];

        $database = BitacoraFirebase::firebaseConnection();

        $camp = strtolower($campania);

        try {
            $tickets = $database->getReference("$camp/ticket")->orderByChild("date")->getSnapshot();
            $data = $tickets;
            return DataTables::of($data->getValue())->toJson();
        } catch (Exception $e) {
            return $e;
        }
    }
}
