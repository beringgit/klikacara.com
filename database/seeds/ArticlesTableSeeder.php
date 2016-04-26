<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'admin_id'  => 1,
                'image_header'  => null,
                'title' => 'Lorem Ipsum',
                'published_at'  => \Carbon\Carbon::now(),
                'edited_at' => null,
                'body' => 'sanaksnaksn asknas ka saks nakanska saks naks na snas akn s' .
                          'n skas naksn aks naksasnaksnaks askas aks askasaknsa'
            ],
            [
                'admin_id'  => 2,
                'image_header'  => null,
                'title' => 'Lorem Ipsum',
                'published_at'  => \Carbon\Carbon::now(),
                'edited_at' => null,
                'body' => 'sanaksnaksn asknas ka saks nakanska saks naks na snas akn s' .
                    'n skas naksn aks naksasnaksnaks askas aks askasaknsa'
            ]
        ]);
    }
}
