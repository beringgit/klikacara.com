<?php

use Illuminate\Database\Seeder;

class ShopCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_carts')->insert([
            [
                'user_id' => 1,
                'product_id' => 2,
                'confirmed_status' => false
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'confirmed_status' => false
            ],
            [
                'user_id' => 1,
                'product_id' => 1,
                'confirmed_status' => false
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'confirmed_status' => false
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'confirmed_status' => false
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'confirmed_status' => false
            ],
        ]);
    }
}
