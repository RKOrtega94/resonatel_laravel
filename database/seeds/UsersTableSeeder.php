<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ///**
        // * Inserting User
        // */
        DB::table('users')
            ->insert([
                'firstName' => 'Robinson Klever',
                'lastName' => 'Ortega Mafla',
                'dni' => '1600870503',
                'email' => 'ortega.robinson.resona@gmail.com',
                'email_verified_at' => now(),
                'user' => 'rkortega',
                'password' => Hash::make('1600870503'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        ///**
        // * Insertin Profile
        // */
        DB::table('profiles')
            ->insert([
                'name' => 'Super Admin',
                'description' => 'Administrador del sistema',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        ///**
        // * Inserting User by profile
        // */
        DB::table('users_profiles')
            ->insert([
                'user_id' => 1,
                'profile_id' => 1,
                'enabled' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
