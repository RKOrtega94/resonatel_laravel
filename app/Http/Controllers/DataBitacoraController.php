<?php

namespace App\Http\Controllers;

use App\BitacoraFirebase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataBitacoraController extends Controller
{
    public function getAll()
    {
        $database = BitacoraFirebase::firebaseConnection();

        $data = [];

        $ref = $database->getReference("tickets/baf");

        $data = $ref->getValue();

        return DataTables::of($data)->toJson();
    }
}
