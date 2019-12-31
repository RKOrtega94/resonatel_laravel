<?php

namespace App\Http\Controllers;

use App\Page;
use App\Profile;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RolController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::all();

        return view('profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profile $profile)
    {
        $profile->create($request->all());
        return redirect()->route('profiles.index')->withStatus(__("Profile successfully created."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $profile = Profile::findOrFail(decrypt($id));
            return view('profiles.show', compact('profile'));
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $profile = Profile::findOrFail(decrypt($id));

            $pages = Page::pluck('name', 'id');

            return view('profiles.edit', compact('profile', 'pages'));
        } catch (Exception $e) {
            abort(404);
        }
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
        try {
            Profile::findOrFail(decrypt($id))->update($request->all());
            return redirect()->route('profiles.index')->withStatus(__("Profile successfully updated."));
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
        try {

            $profile = Profile::findOrFail(decrypt($id));
            $profile->update([
                'enabled' => 0
            ]);
            $profile->delete();
            return redirect()->route('profiles.index')->withStatus(__("Profile successfully deleted."));
        } catch (Exception $e) {
            abort(500);
        }
    }
}
