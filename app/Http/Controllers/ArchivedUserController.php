<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ArchivedUserController extends Controller
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
        return view('users.index', ['activePage' => 'archived-users', 'users' => User::archivedUsers(), 'date' => 'Deleted']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::withTrashed()
            ->where('user', $user)
            ->restore();
        return redirect()->route('archivedusers.index')->withStatus(__('User successfully restored.'));
    }
}
