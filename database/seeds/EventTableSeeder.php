<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([

         [
                'name'=> 'Carsten Behmel',
                'title'=> 'Tisch 1',
                'NumberOfPeople' => '4',
                'phone'=>'01702923143',
                'start'=> '2020-03-11 15:00:00',
                'end'=> '2020-03-11 17:00:00',
                'color'=>'#c40233',
                'description'=> ' Hallo',
             ],

        ]);
    }
}
