<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('product_category')->truncate();

        DB::table('product_category')->insert([
            [
                'name'  => 'musik'
            ],
            [
                'name'  => 'apparel'
            ],
            [
                'name'  => 'venue'
            ],
            [
                'name'  => 'id_card'
            ],
            [
                'name'  => 'food'
            ],
            [
                'name'  => 'camp'
            ],
            [
                'name'  => 'sound_system'
            ],
            [
                'name'  => 'live_show'
            ],
            [
                'name'  => 'ticketing'
            ],
            [
                'name'  => 'transportation'
            ]
        ]);
    }
}
