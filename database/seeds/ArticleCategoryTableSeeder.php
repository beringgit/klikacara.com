<?php

use Illuminate\Database\Seeder;

class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_category')->insert([
            [
                'name'  => 'Promo'
            ],
            [
                'name'  => 'Berita'
            ],
            [
                'name'  => 'Kesehatan'
            ],
            [
                'name'  => 'Keuangan'
            ]
        ]);
    }
}
