<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'user', 'dni', 'email', 'group', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listUsers()
    {
        return $this->where('users.enabled', 1)
            ->join('users_profiles', 'users.id', 'users_profiles.user_id')
            ->join('profiles', 'profiles.id', 'users_profiles.profile_id')
            ->select('profiles.name as profile', 'users.*')
            ->get()
            ->toArray();
    }
    public static function users()
    {
        return DB::table('users')
            ->where('users.enabled', 1)
            ->join('users_profiles', 'users.id', 'users_profiles.user_id')
            ->join('profiles', 'profiles.id', 'users_profiles.profile_id')
            ->select('profiles.name as profile', 'users.*')
            ->get();
    }
}
