<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Guest',
            'description' => 'Default unauthenticated user'
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
            'description' => 'Authenticated user'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Authenticated administrator'
        ]);
    }
}
