<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
           [
               'name'   => 'Klik Acara',
               'email'  => 'klik@acara.com',
               'phone'  => '089672987967',
               'gender'    => 'male',
               'bdate'  => Carbon\Carbon::now(),
               'password'   => bcrypt('suksesbersama123')
           ],
            [
                'name'   => 'Rizqy Faishal',
                'email'  => 'rizqy@beringin.net',
                'phone'  => '089672987967',
                'gender'    => 'male',
                'bdate'  => Carbon\Carbon::now(),
                'password'   => bcrypt('majujaya123')
            ]
        ]);
    }
}
