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
            'name' => 'Dashboard',
            'slug' => 'home',
            'brand' => 'dashboard',
            'icon' => 'dashboard',
            'idItem' => 'dashboard',
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Laravel Example',
            'slug' => '#',
            'brand' => 'laravelExample',
            'icon' => 'people',
            'idItem' => 'laravelExample',
            'parent' => 0,
            'order' => 1,
        ]);
        DB::table('menus')->insert([
            'name' => 'Profile',
            'slug' => 'profile.edit',
            'brand' => 'profile',
            'icon' => 'person',
            'idItem' => 'profile',
            'parent' => 2,
            'order' => 0,
        ]);
    }
}
