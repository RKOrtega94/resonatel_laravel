<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Mail\WellcomeMail;
use App\Profile;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
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
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ruta = Route::getCurrentRoute()->getName();
        return view('users.index', ['activePage' => 'user-management', 'users' => User::users(), 'date' => 'Creation date', 'navCategory' => 'maintenance']);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = DB::table('profiles')
            ->get();
        return view('users.create', ['activePage' => 'user-management', 'roles' => Profile::all()]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $model = new User();
        $user = $model->create($request->merge([
            'password' => Hash::make($request->password)
        ])->all());
        DB::table('users_profiles')->insert([
            'user_id' => $user->id,
            'profile_id' => $request->profile,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Mail::to($user->email)->send(new WellcomeMail($user));
        return redirect()->route('user.index')->withStatus(__("User successfully created."));;
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = DB::table('profiles')
            ->get();
        return view('users.edit', compact('user'), ['activePage' => 'user-management', 'navCategory' => 'maintenance', 'roles' => $roles]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UserRequest $request)
    {
        $user->update($request->merge([
            'password' => Hash::make($request->password)
        ])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
