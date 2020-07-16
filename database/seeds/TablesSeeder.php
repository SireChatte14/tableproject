<?php

use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\table::create(
            [
                'tableNumber' => '1',
                'numberOfSeats' => '4',
                'color' => '#edf800',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '2',
                'numberOfSeats' => '4',
                'color' => '#ab1b00',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '3',
                'numberOfSeats' => '4',
                'color' => '#8dd4ff',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '4',
                'numberOfSeats' => '4',
                'color' => '#65ff37',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '5',
                'numberOfSeats' => '4',
                'color' => '#7f4be5',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '6',
                'numberOfSeats' => '4',
                'color' => '#38a24c',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '7',
                'numberOfSeats' => '4',
                'color' => '#84a355',

            ]
        );

        \App\table::create(
            [
                'tableNumber' => '8',
                'numberOfSeats' => '4',
                'color' => '#e67a00',

            ]
        );
    }
}
