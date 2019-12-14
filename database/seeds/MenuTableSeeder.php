<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Opción 1',
            'slug' => 'opcion1',
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 2',
            'slug' => 'opcion2',
            'parent' => 0,
            'order' => 1,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 3',
            'slug' => 'opcion3',
            'parent' => 0,
            'order' => 2,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 4',
            'slug' => 'opcion4',
            'parent' => 0,
            'order' => 3,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 1.1',
            'slug' => 'opcion-1.1',
            'parent' => 1,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 1.2',
            'slug' => 'opcion-1.2',
            'parent' => 1,
            'order' => 1,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 3.1',
            'slug' => 'opcion-3.1',
            'parent' => 3,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 3.2',
            'slug' => 'opcion-3.2',
            'parent' => 3,
            'order' => 1,
        ]);
        DB::table('menus')->insert([
            'name' => 'Opción 4.1',
            'slug' => 'opcion-4.1',
            'parent' => 4,
            'order' => 0,
        ]);
    }
}
