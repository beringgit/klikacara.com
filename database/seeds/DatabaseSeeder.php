<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(AdminTableSeeder::class);
         $this->call(EventCategoryTableSeeder::class);
         $this->call(EventDateTableSeeder::class);
         $this->call(EventLocationTableSeeder::class);
         $this->call(SpeakersTableSeeder::class);
         $this->call(EventsTableSeeder::class);
         $this->call(EventSpeakerTableSeeder::class);
         $this->call(EventsEventCategoryTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(ArticleCategoryTableSeeder::class);
         $this->call(ArticlesArticleCategoryTableSeeder::class);
         $this->call(ProductCategoriesTableSeeder::class);
         $this->call(ProvidersTableSeeder::class);
         $this->call(ProductProviderTableSeeder::class);
         $this->call(ShopCartsTableSeeder::class);
         $this->call(ProductRequestsTableSeeder::class);

    }
}
