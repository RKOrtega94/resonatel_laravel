<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use SoftDeletes;

    //protected
    /**
     * The attributes that should be show for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'brand', 'icon', 'menu_item'
    ];

    public static function getMenuAll()
    {
        return DB::table('menus')
            ->where('deleted_at', null)
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name')
            ->get();
    }
}
