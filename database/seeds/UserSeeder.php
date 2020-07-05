<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'rbdundas',
            'email' => 'rbdundas@gmail.com',
            'password' => Hash::make('#S3pt3mb3r2002?'),
            'role_id' => 3
        ]);
    }
}
