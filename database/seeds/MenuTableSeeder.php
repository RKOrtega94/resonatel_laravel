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
            'show' => 1,
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Mintenance',
            'slug' => '#',
            'brand' => 'maintenance',
            'icon' => 'perm_data_setting',
            'idItem' => 'maintenance',
            'show' => 1,
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'User Management',
            'slug' => 'user.index',
            'brand' => 'user-management',
            'icon' => 'people_alt',
            'idItem' => 'userManagement',
            'show' => 1,
            'parent' => 2,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Roles Management',
            'slug' => 'roles.index',
            'brand' => 'roles-management',
            'icon' => 'verified_user',
            'idItem' => 'rolManagement',
            'show' => 1,
            'parent' => 2,
            'order' => 1,
        ]);
        DB::table('menus')->insert([
            'name' => 'Navigation Management',
            'slug' => 'navigation.index',
            'brand' => 'navigation-management',
            'icon' => 'navigation',
            'idItem' => 'navigationManagement',
            'show' => 1,
            'parent' => 2,
            'order' => 2,
        ]);
        DB::table('menus')->insert([
            'name' => 'profile',
            'slug' => 'profile.edit',
            'brand' => 'profile',
            'icon' => 'person',
            'idItem' => 'profileManagement',
            'show' => 0,
            'parent' => 0,
            'order' => 0,
        ]);
        DB::table('menus')->insert([
            'name' => 'Create User',
            'slug' => 'user/create',
            'brand' => 'create-management',
            'icon' => 'person',
            'idItem' => 'createUser',
            'show' => 0,
            'parent' => 0,
            'order' => 200,
        ]);
        DB::table('menus')->insert([
            'name' => 'Delete User',
            'slug' => 'user/destroy/',
            'brand' => 'delete-management',
            'icon' => 'person',
            'idItem' => 'deleteUser',
            'show' => 0,
            'parent' => 0,
            'order' => 201,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 2,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 3,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 4,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 5,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 6,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 7,
            'role_id' => 1,
        ]);
        DB::table('menu_by_rols')->insert([
            'menu_id' => 8,
            'role_id' => 1,
        ]);
    }
}
