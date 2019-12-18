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
        DB::table('role')->insert([
            'name' => 'Super Admin',
            'description' => 'Administrador general del sistema',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role')->insert([
            'name' => 'Supervisor General',
            'description' => 'Supervisor general del sistema',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role')->insert([
            'name' => 'Supervisor',
            'description' => 'Supervisor de campaña',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role')->insert([
            'name' => 'User',
            'description' => 'Usuario',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('group')->insert([
            'name' => 'BAF',
            'description' => 'Soporte N1, banda ancha fija',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('group')->insert([
            'name' => 'CHAT',
            'description' => 'Soporte N1, chat soporte',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('group')->insert([
            'name' => 'PW',
            'description' => 'Soporte N1, página web, ticket out',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('group')->insert([
            'name' => 'Admin',
            'description' => 'Administradores',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'firstName' => 'Robinson',
            'lastName' => 'Ortega',
            'dni' => '1600870503',
            'role_id' => '1',
            'group_id' => '4',
            'email' => 'ortega.robinson.resona@gmail.com',
            'email_verified_at' => now(),
            'user' => 'rkortega',
            'password' => Hash::make('1600870503'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
