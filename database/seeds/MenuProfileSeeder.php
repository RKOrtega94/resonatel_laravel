<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 1
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 2
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 3
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 4
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 5
            ]);
    }
}
