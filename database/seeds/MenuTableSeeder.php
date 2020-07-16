<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([

            [
                'title'=> 'Bratwurst',
                'description'=> 'mit Salat',
                'price'=> '€ 3,50',

            ],

        ]);
    }
}
