<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    public static function findPage($ruta)
    {
        $page = new Page();

        return DB::table('profiles_pages')
            ->where('pages.name', $ruta)
            ->where('users.id', auth()->user()->id)
            ->join('pages', 'profiles_pages.page_id', 'pages.id')
            ->join('profiles', 'profiles_pages.profile_id', 'profiles.id')
            ->join('users_profiles', 'profiles.id', 'users_profiles.profile_id')
            ->join('users', 'users_profiles.user_id', 'users.id')
            ->count();
    }
}
