<?php

namespace App\Http\Controllers;

use App\BitacoraFirebase;
use DateTime;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BitacoraController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware(['auth', 'profile']);
    //}

    public function index(Request $request)
    {
        $value = Cache::get('key');
        return $value;
        return view('bitacoras.data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bitacoras.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = (new DateTime())->format('Y');
        $month = (new DateTime())->format('m');
        $day = (new DateTime())->format('d');

        $database = BitacoraFirebase::firebaseConnection();

        $ticket = $database
            ->getReference("tickets/" . strtolower(auth()->user()->group) . "/$year/$month/$day/" . auth()->user()->user . "/" . $request->ticket)
            ->set($request->all());

        $key = $ticket->getKey();

        return redirect()->route('bitacora.create')->withStatus(__("El ticket $key ha sido guardado correctamente."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
