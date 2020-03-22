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
        \App\Role::create(
        [
            'name' => 'Administrator',
            'description' => 'Gruppe der Admimnstratoren',
            'permissions' => ["is-admin" => true],
            'is_active' => true,

        ]
    );

        \App\Role::create(
            [
                'name' => 'User',
                'description' => 'Gruppe der angemeldeten Benutzer',
                'permissions' => ["is-admin" => false],
                'is_active' => true,

            ],
            );

    }
}
