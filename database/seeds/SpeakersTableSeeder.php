<?php

use Illuminate\Database\Seeder;

class SpeakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('speakers')->truncate();
        DB::table('speakers')->insert([
            [
                'name'  => 'Rohmat Taufik',
                'position'  => 'CEO Galaxy Bima Sakti',
                'topic_title'   => 'sasasnkasnak aksna sna ',
                'company'   => 'Beringin.net'
            ],
            [
                'name'  => 'Wahyu Prihantoro',
                'position'  => 'CEO Galaxy Bimsasasaa Sakti',
                'topic_title'   => 'sasasnkaasasnasak aksna sassna ',
                'company'   => 'Beriasasangin.sasnet'
            ]
        ]);
    }
}
