<?php

use Illuminate\Database\Seeder;

class EventCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('event_category')->truncate();
        DB::table('event_category')->insert([
            [
                'name'  => 'Education'
            ],
            [
                'name'  => 'Bussiness'
            ],
            [
                'name'  => 'Social'
            ],
            [
                'name'  => 'Politics'
            ]
        ]);
    }
}
