<?php

use Illuminate\Database\Seeder;

class EventDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('event_date')->truncate();
        DB::table('event_date')->insert([
            [
                'register_open' => \Carbon\Carbon::now(),
                'register_close' => \Carbon\Carbon::now(),
                'event_start'   => Carbon\Carbon::now(),
                'event_close'   => Carbon\Carbon::now(),
                'date'   => Carbon\Carbon::now(),
                'event_id'  => 1
            ],
            [
                'register_open' => \Carbon\Carbon::now(),
                'register_close' => \Carbon\Carbon::now(),
                'event_start'   => Carbon\Carbon::now(),
                'event_close'   => Carbon\Carbon::now(),
                'date'   => Carbon\Carbon::now(),
                'event_id'  => 2
            ]
        ]);
    }
}
