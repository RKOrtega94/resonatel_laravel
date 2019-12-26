<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{

    /**
     * Función para validar permisos
     */
    protected function validatePath()
    {
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => User::users()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = DB::table('profiles')
            ->where('enabled', 1)
            ->get();
        return view('users.create', ['roles' => $roles]);
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
            ->where('enabled', 1)
            ->get();
        return view(
            'users.edit',
            compact('user'),
            ['roles' => $roles]
        );
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
        $user->update($request->validated());

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
        $user->update([
            'enabled' => 0
        ]);
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
