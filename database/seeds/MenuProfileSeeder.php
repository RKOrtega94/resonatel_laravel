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
                'menu_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_menus')
            ->insert([
                'profile_id' => 1,
                'menu_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
