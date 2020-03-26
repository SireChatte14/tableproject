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
            'name' => 'Admin',
            'description' => 'Gruppe der Admimnstratoren',
            'permissions' => ["is-admin" => true],
            'is_active' => true,

        ]
    );

        \App\Role::create(
            [
                'name' => 'User',
                'description' => 'Gruppe der angemeldeten Benutzer',
                'permissions' => ["is-user" => true],
                'is_active' => true,

            ]
            );

        \App\Role::create(
            [
                'name' => 'Employee',
                'description' => 'Gruppe der angemeldeten Mitrbeiter',
                'permissions' => ["is-employee" => true],
                'is_active' => true,

            ]
        );

    }

}
