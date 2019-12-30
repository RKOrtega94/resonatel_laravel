<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')
            ->insert([
                'name' => 'home',
                'URL' => 'home',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 1,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
