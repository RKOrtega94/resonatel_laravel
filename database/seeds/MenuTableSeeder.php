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
            'name' => 'Home',
            'brand' => 'home',
            'slug' => 'home',
            'icon' => 'home',
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
            'icon' => 'person',
            'parent' => 2,
            'order' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.index',
            'icon' => 'people',
            'parent' => 2,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.index',
            'icon' => 'near_me',
            'parent' => 2,
            'order' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Archived',
            'brand' => 'archived',
            'slug' => '#',
            'icon' => 'archive',
            'parent' => 0,
            'order' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Archived Users',
            'brand' => 'archived-users',
            'slug' => 'archivedusers.index',
            'icon' => 'person',
            'parent' => 6,
            'order' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Archived Profiles',
            'brand' => 'archived-profiles',
            'slug' => 'archivedprofiles.index',
            'icon' => 'people',
            'parent' => 6,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Archived Menus',
            'brand' => 'archived-menus',
            'slug' => 'archivedmenus.index',
            'icon' => 'near_me',
            'parent' => 6,
            'order' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
