<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use SoftDeletes;
    public static function getMenuAll()
    {
        return DB::table('menus')
            ->where('deleted_at', null)
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name')
            ->get();
    }
    public function getRouteKeyName()
    {
        return 'brand';
    }
}
