<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    //protected
    /**
     * The attributes that should be show for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'group', 'firstName', 'lastName', 'dni', 'email', 'user', 'password'
    ];

    //protected
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

    public function indicators()
    {
        return $this->belongsToMany('App\Indicator', 'indicator_users');
    }

    public function profiles()
    {
        return $this->belongsToMany('App\Profile', 'users_profiles');
    }

    /**
     * List of all enabled users
     */
    public static function users()
    {
        return DB::table('users')
            ->where('users.deleted_at', null)
            ->join('users_profiles', 'users.id', 'users_profiles.user_id')
            ->join('profiles', 'profiles.id', 'users_profiles.profile_id')
            ->select('profiles.name as profile', 'users.*')
            ->get();
    }

    /**
     * List of all archived users
     */
    public static function archivedUsers()
    {
        return DB::table('users')
            ->where('users.deleted_at', '!=', null)
            ->join('users_profiles', 'users.id', 'users_profiles.user_id')
            ->join('profiles', 'profiles.id', 'users_profiles.profile_id')
            ->select('profiles.name as profile', 'users.*')
            ->get();
    }

    public static function getDisabledUser($user)
    {
        return DB::table('users')
            ->where('user', $user)
            ->get();
    }

    public function getRouteKeyName()
    {
        return 'user';
    }
}
