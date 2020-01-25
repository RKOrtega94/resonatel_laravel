<?php

namespace App\Http\Controllers;

use App\Indicator;
use App\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Yajra\DataTables\DataTables;

class IndicatorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('indicators.supervisor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user)
    {
        return DataTables::of(User::with('profiles', 'indicators')
            ->where('group', auth()->user()->group)
            ->where('id', '!=', auth()->user()->id)
            ->get())
            ->addColumn('btn', 'indicators.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('profiles', 'indicators')->find(decrypt($id));
        $indicators = Indicator::all()->where('group', $user->group);
        return view('indicators.supervisor.edit', ['user' => $user, 'indicators' => $indicators]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userData)
    {
        $data = decrypt($userData);
        $user = User::findOrFail($data->id);
        $user->indicators()->sync($request->indicators);
        return redirect()->route('indicator.index')->withStatus(__("Profile successfully updated."));
        try {
        } catch (Exception $e) {
            abort(500);
        }
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
