<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use SoftDeletes;

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_profiles');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'profiles_menus');
    }

    protected $fillable = ['name', 'description', 'enabled'];

    public static function getProfiles()
    {
        return DB::table('profiles')
            ->where('deleted_at', null)
            ->get();
    }

    public static function getProfileById($id)
    {
        return DB::table('profiles')
            ->where('id', $id)
            ->get();
    }
}
