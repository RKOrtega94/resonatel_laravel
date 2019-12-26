<?php

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
            'brand' => 'dashboard',
            'slug' => 'home',
            'icon' => 'dashboard',
            'parent' => 0,
            'order' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Maintenance',
            'brand' => 'maintenance',
            'slug' => '#',
            'icon' => 'settings_applications',
            'parent' => 0,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'User Management',
            'brand' => 'user-management',
            'slug' => 'user.index',
            'icon' => 'people',
            'parent' => 2,
            'order' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
