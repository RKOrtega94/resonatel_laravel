<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use SoftDeletes;

    public function pages()
    {
        return $this->belongsToMany('App\Page', 'profiles_pages');
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
