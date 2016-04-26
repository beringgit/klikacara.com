<?php

use Illuminate\Database\Seeder;

class ProductRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_requests')->insert([
            [
                'shop_carts_id' => 1,
            ],
            [
                'shop_carts_id' => 2
            ],
            [
                'shop_carts_id' => 3
            ],
            [
                'shop_carts_id' => 4
            ],
            [
                'shop_carts_id' => 5
            ],

        ]);
    }
}
