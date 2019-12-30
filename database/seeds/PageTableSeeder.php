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
        DB::table('pages')
            ->insert([
                'name' => 'profile edit',
                'URL' => 'profile.edit',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'profile update',
                'URL' => 'profile.update',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'profile password',
                'URL' => 'profile.password',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user index',
                'URL' => 'user.index',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user create',
                'URL' => 'user.create',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user store',
                'URL' => 'user.store',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user edit',
                'URL' => 'user.edit',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user update',
                'URL' => 'user.update',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('pages')
            ->insert([
                'name' => 'user destroy',
                'URL' => 'user.destroy',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('pages')
            ->insert([
                'name' => 'profiles index',
                'URL' => 'profiles.index',
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
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 2,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 3,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 4,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 5,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 6,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 7,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 8,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 9,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        DB::table('profiles_pages')
            ->insert([
                'page_id' => 10,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('profiles_pages')
            ->insert([
                'page_id' => 11,
                'profile_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
