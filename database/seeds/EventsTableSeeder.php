<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('events')->truncate();
        DB::table('events')->insert([
            [
                'title' => 'Klikacara.com presentsas sasnaksa',
                'theme' => 'asasmlamslmslasma',
                'organization'  => 'klikacara.com',
                'body'  => 'alsmalsmal ams almal almsa smals als alsma lsmals almsals asal ',
                'website'   => 'klikacara.com',
                'fee'   => 3000,
                'quota' => 300,
                'eventable_id' => 1,
                'eventable_type' => 'App\Provider',
                'poster'    => null,
                'location_id'   => 1,
                'date_id'   => 2,
                'category_id'   => 2
            ],
            [
                'title' => 'Klikacara.com presents sassanaksa12',
                'theme' => 'asasmlamslmslasm2a',
                'organization'  => 'klikacara.com2',
                'body'  => 'alsmalsmal a2ms almal almsa smals als alsma lsmals almsals asal ',
                'website'   => 'klikacara.com2',
                'fee'   => 30002,
                'quota' => 3002,
                'eventable_id' => 1,
                'eventable_type' => 'App\User',
                'poster'    => null,
                'location_id'   => 2,
                'date_id'   => 2,
                'category_id'   => 2
            ],[
                'title' => 'Klikacara.com prsaesents sasnaksa',
                'theme' => 'asasmlamslmslasma',
                'organization'  => 'klikacara.com',
                'body'  => 'alsmalsmal ams almal almsa smals als alsma lsmals almsals asal ',
                'website'   => 'klikacara.com',
                'fee'   => 3000,
                'quota' => 300,
                'eventable_id' => 1,
                'eventable_type' => 'App\User',
                'poster'    => null,
                'location_id'   => 1,
                'date_id'   => 2,
                'category_id'   => 2
            ],
            [
                'title' => 'Klikacara.com presents a12',
                'theme' => 'asasmlamslmslasm2asa',
                'organization'  => 'klikacara.com2',
                'body'  => 'alsmalsmal a2ms almal almsasa smals als alsma lsmals almsals asal ',
                'website'   => 'klikacara.com2',
                'fee'   => 30002,
                'quota' => 3002,
                'eventable_id' => 1,
                'eventable_type' => 'App\Provider',
                'poster'    => null,
                'location_id'   => 2,
                'date_id'   => 2,
                'category_id'   => 2
            ]
        ]);
    }
}
