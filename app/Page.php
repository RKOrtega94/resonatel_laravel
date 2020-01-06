<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    public static function findPage($ruta)
    {
        return DB::table('profiles_menus')
            ->where('menus.slug', 'like', $ruta)
            ->where('users.id', auth()->user()->id)
            ->join('menus', 'profiles_menus.menu_id', 'menus.id')
            ->join('profiles', 'profiles_menus.profile_id', 'profiles.id')
            ->join('users_profiles', 'profiles.id', 'users_profiles.profile_id')
            ->join('users', 'users_profiles.user_id', 'users.id')
            ->count();
    }
}
