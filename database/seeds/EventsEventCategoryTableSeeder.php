<?php

use Illuminate\Database\Seeder;

class EventsEventCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events_event_category')->insert([
            [
                'event_id'  => 1,
                'category_id' => 1
            ],
            [
                'event_id'  => 1,
                'category_id' => 2
            ],
            [
                'event_id'  => 1,
                'category_id' => 3
            ],
            [
                'event_id'  => 2,
                'category_id' => 2
            ],
            [
                'event_id'  => 2,
                'category_id' => 4
            ]
        ]);
    }
}
