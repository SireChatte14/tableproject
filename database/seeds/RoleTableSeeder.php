<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role')->delete();

        \DB::table('role')->insert ([

            0 => [
                'name' => 'Administrator',
                'description' => 'Gruppe der Admimnstratoren',
                'permissions' => ["is-admin" => true],
                'is_active' => true,
            ],

            1 => [
                'name' => 'User',
                'description' => 'Gruppe der angemeldeten Benutzer',
                'permissions' => ["is-admin" => false],
                'is_active' => true,
            ],
        ]);
    }
}
