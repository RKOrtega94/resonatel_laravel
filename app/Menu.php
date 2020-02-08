<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

use Kyslik\ColumnSortable\Sortable;

class Menu extends Model
{
    use SoftDeletes, Sortable;

    //protected
    /**
     * The attributes that should be show for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'brand', 'icon', 'menu_item', 'order', 'parent'
    ];

    public $sortable = [
        'id',
        'name',
        'order',
        
    ];

    public static function getMenuAll()
    {
        return DB::table('menus')
            ->where('deleted_at', null)
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name');
    }

    public static function getNavs()
    {
        return DB::table('menus')
            ->where('deleted_at', null)
            ->where('menu_item', 1)
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name')
            ->get();
    }
}
