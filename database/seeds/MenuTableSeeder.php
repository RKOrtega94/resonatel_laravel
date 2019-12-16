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
            'parent' => 0,
            'order' => 0,
        ]);
    }
}
