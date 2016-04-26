<?php

use Illuminate\Database\Seeder;

class ArticlesArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles_article_category')->truncate();
        DB::table('articles_article_category')->insert([
            [
                'article_id'  => 1,
                'category_id'   => 2
            ],
            [
                'article_id'  => 1,
                'category_id'   => 1
            ],
            [
                'article_id'  => 2,
                'category_id'   => 1
            ],
            [
                'article_id'  => 2,
                'category_id'   => 2
            ],
            [
                'article_id'  => 1,
                'category_id'   => 3
            ],
        ]);
    }
}
