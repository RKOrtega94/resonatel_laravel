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
            'menu_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profile',
            'brand' => 'profile',
            'slug' => 'profile.update',
            'icon' => 'person',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profile',
            'brand' => 'profile',
            'slug' => 'profile.edit',
            'icon' => 'person',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profile',
            'brand' => 'profile',
            'slug' => 'profile.password',
            'icon' => 'person',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
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
            'menu_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'User Management',
            'brand' => 'user-management',
            'slug' => 'user.index',
            'icon' => 'person',
            'parent' => 5,
            'order' => 0,
            'menu_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Create User',
            'brand' => 'user-management',
            'slug' => 'user.create',
            'icon' => 'add',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Store User',
            'brand' => 'user-management',
            'slug' => 'user.store',
            'icon' => 'add',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Show User',
            'brand' => 'user-management',
            'slug' => 'user.show',
            'icon' => 'visibility',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Update User',
            'brand' => 'user-management',
            'slug' => 'user.update',
            'icon' => 'create',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Destroy User',
            'brand' => 'user-management',
            'slug' => 'user.destroy',
            'icon' => 'delete_sweep',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Edit User',
            'brand' => 'user-management',
            'slug' => 'user.edit',
            'icon' => 'create',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.index',
            'icon' => 'people',
            'parent' => 5,
            'order' => 1,
            'menu_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.store',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.create',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.show',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.update',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.destroy',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Profiles Management',
            'brand' => 'profiles-management',
            'slug' => 'profiles.edit',
            'icon' => 'people',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.index',
            'icon' => 'near_me',
            'parent' => 5,
            'order' => 2,
            'menu_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.store',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.create',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.show',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.update',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.destroy',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('menus')->insert([
            'name' => 'Menu Management',
            'brand' => 'menu-management',
            'slug' => 'menu.edit',
            'icon' => 'near_me',
            'parent' => 0,
            'order' => 0,
            'menu_item' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
