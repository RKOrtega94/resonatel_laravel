<?php

namespace App\Http\Controllers;

use App\BitacoraFirebase;
use App\Http\Requests\BitacoraRequest;
use App\User;
use DateTime;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'profile']);
    }

    public function index(Request $request)
    {
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
    public function store(BitacoraRequest $request)
    {
        // Firebase instace
        $database = BitacoraFirebase::firebaseConnection();

        // User group
        $group = strtolower(auth()->user()->group);

        // Setting data
        $ticket = $database
            ->getReference("$group/ticket")
            ->push($request->merge([
                'date' => now()->format('d/m/Y'),
                'hour' => now()->format('H:i'),
                'user' => auth()->user()->user
            ])->all());

        $key = $ticket->getChild('ticket')->getValue();

        $ticket->update([
            'id' => $ticket->getKey()
        ]);

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
        // Firebase instace
        $database = BitacoraFirebase::firebaseConnection();

        // User group
        $group = strtolower(auth()->user()->group);

        // Setting data
        $data = $database
            ->getReference("$group/ticket/$id");

        $ticket = $data->getSnapshot();

        return view('bitacoras.index', ['ticket' => $ticket->getValue()]);
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
        // Firebase instace
        $database = BitacoraFirebase::firebaseConnection();

        // User group
        $group = strtolower(auth()->user()->group);

        // Setting data
        $data = $database
            ->getReference("$group/ticket/$id");

        $ticket = $data->getChild('ticket')->getValue();

        $data->update(
            $request->all()
        );

        return redirect()->route('bitacora.create')->withStatus(__("El ticket $ticket ha sido actualizado correctamente."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Firebase instace
        $database = BitacoraFirebase::firebaseConnection();

        // User group
        $group = strtolower(auth()->user()->group);

        // Setting data
        $data = $database
            ->getReference("$group/ticket/$id");

        $ticket = $data->getChild('ticket')->getValue();

        $data->remove();

        return redirect()->route('bitacora.create')->withStatus(__("El ticket $ticket ha sido eliminado correctamente."));
    }
}
