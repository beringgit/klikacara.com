<?php

use Illuminate\Database\Seeder;

class EventLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('event_location')->truncate();
        DB::table('event_location')->insert([
            [
                'location' => 'Balairung, Universitas Indoensia'
            ],
            [
                'location'  => 'CDC UI'
            ],
            [
                'location'  => 'Fakultas Ilmu Komputer, Universitas Indonesia'
            ]
        ]);
    }
}
