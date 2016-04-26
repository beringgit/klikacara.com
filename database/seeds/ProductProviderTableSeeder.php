<?php

use Illuminate\Database\Seeder;

class ProductProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_providers')->insert([
            [
                'category_id' => 1,
                'satuan' => 'Kilovolt',
                'price_per_item' => 300000,
                'description' => 'sa alsmals asma smals alsma sm',
                'provider_id' => 1
            ],
            [
                'category_id' => 2,
                'satuan' => 'Kilovolt',
                'price_per_item' => 300000,
                'description' => 'sa alsmals asma smals alsma sm',
                'provider_id' => 1
            ],
            [
            'category_id' => 3,
            'satuan' => 'Kilovolt',
            'price_per_item' => 300000,
            'description' => 'sa alsmals asma smals alsma sm',
            'provider_id' => 2
        ],
        [
                'category_id' => 1,
                'satuan' => 'Kilovolt',
                'price_per_item' => 300000,
                'description' => 'sa alsmals asma smals alsma sm',
                'provider_id' => 2
            ]
        ]);
    }
}
