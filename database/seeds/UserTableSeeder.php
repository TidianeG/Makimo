<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name'=> 'Makimo',
                    'email'=> 'admin@makimo',
                    'email_verified_at' => now(),
                    'password'=> '$2y$10$LWF57nf3m8nIVaU3PODjTuSy8lF1SAASgzxGktgoWpOARnJ9.j0zq', // password
                    'roles'=> 'admin',
                    'remember_token' => Str::random(10),
                ],
                
            ]
        );
    }
}
