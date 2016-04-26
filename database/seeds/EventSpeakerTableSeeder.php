<?php

use Illuminate\Database\Seeder;

class EventSpeakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('event_date')->truncate();
        DB::table('event_speaker')->insert([
           [
               'event_id'  => 1,
               'speaker_id' => 1
           ],
            [
                'event_id'  => 2,
                'speaker_id' => 1
            ]
        ]);
    }
}
