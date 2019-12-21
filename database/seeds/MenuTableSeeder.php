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
            'name' => 'Mintenance',
            'slug' => '#',
            'brand' => 'maintenance',
            'icon' => 'perm_data_setting',
            'idItem' => 'maintenance',
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'User Management',
            'slug' => 'user.index',
            'brand' => 'user-management',
            'icon' => 'people_alt',
            'idItem' => 'userManagement',
            'parent' => 2,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Navigation Management',
            'slug' => 'maintenance.navigation.index',
            'brand' => 'navigation-management',
            'icon' => 'navigation',
            'idItem' => 'navigationManagement',
            'parent' => 2,
            'order' => 1,
        ]);
    }
}
