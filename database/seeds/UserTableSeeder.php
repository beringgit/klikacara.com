<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'fname'     => 'Rizqy',
                'lname'     => 'Faishal',
                'email'     => 'rizqyfaishal@hotmail.com',
                'sex'       => 'P',
                'bdate'     => Carbon\Carbon::now(),
                'phone'     => '089672987967',
                'password'  => bcrypt('password'),
                'username'  => 'rizqyfaishal'
            ],
            [
                'fname'     => 'Rohmat',
                'lname'     => 'Taufik',
                'email'     => 'rohmattaufik@hotmail.com',
                'sex'       => 'P',
                'bdate'     => Carbon\Carbon::now(),
                'phone'     => '085647451424',
                'password'  => bcrypt('password'),
                'username'  => 'rohmattaufik'
            ],
            [
                'fname'     => 'Wahyu',
                'lname'     => 'Prihantoro',
                'email'     => 'wahyuprihantoro@hotmail.com',
                'sex'       => 'P',
                'bdate'     => Carbon\Carbon::now(),
                'phone'     => '085641910348',
                'password'  => bcrypt('password'),
                'username'  => 'wahyu_prihantoro'
            ]
        ]);
    }
}
