<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicator extends Model
{
    protected $fillable = [
        'name', 'description', 'meta', 'signo'
    ];

    public static function indicators()
    {
        return DB::table('indicators')
            ->get()
            ->toArray();
    }
}
