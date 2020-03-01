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

    public function getAllByDate($group, $start, $end)
    {
        $data = [];

        $startDate = date("Y-m-d", strtotime($start));
        $startYear = date("Y", strtotime($start));
        $endDate = date("Y-m-d", strtotime($end));
        $endYear = date("Y", strtotime($end));

        $database = BitacoraFirebase::firebaseConnection();

        $camp = strtolower($group);

        try {
            $tickets = $database->getReference("$camp/ticket")->orderByChild("date")->getSnapshot();
            foreach ($tickets->getValue() as $key => $value) {
                $date = str_replace('/', '-', $value['date']);
                $dateValue = date("Y-m-d", strtotime($date));
                $yearValue = date("Y", strtotime($date));
                if (($startDate <= $dateValue)
                    && ($endDate >= $dateValue)
                    && ($startYear <= $yearValue)
                    && ($endYear >= $yearValue)
                ) {
                    $data = array_merge($data, [$key => $value]);
                }
            }
            return DataTables::of($data)->toJson();
        } catch (Exception $e) {
            return $e;
        }
    }
}
