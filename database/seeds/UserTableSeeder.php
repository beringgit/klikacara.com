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
                'name' => 'Alibaba',
                'email' => 'ali@baba.com',
                'gender'   => 'female',
                'bdate' => \Carbon\Carbon::now(),
                'phone' => '089672987967',
                'password'  => bcrypt('password')
            ],
            [
                'name' => 'Alibaba2',
                'email' => 'ali@baba2.com',
                'gender'   => 'female',
                'bdate' => \Carbon\Carbon::now(),
                'phone' => '089672987967',
                'password'  => bcrypt('password')
            ],
            [
                'name' => 'Alibaba3',
                'email' => 'ali@baba3.com',
                'gender'   => 'male',
                'bdate' => \Carbon\Carbon::now(),
                'phone' => '089672987967',
                'password'  => bcrypt('password')
            ]
        ]);
    }
}
