<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                'company_name'  => 'Maju Jaya',
                'company_email' => 'majujaya@maju.com',
                'company_telephone' => '089672987967',
                'company_logo' => 'sas',
                'description'   => 'sasalamsmalsmalsmalsmalsmalsma',
                'username' => 'maju_jaya'
            ],
            [
                'company_name'  => 'Maju Jaya2',
                'company_email' => 'majujay2a@maju.com',
                'company_telephone' => '029672987967',
                'company_logo' => 'sas',
                'description'   => 'sasalamsmalsmalsmalsmalsmalsmasdsd22',
                'username' => 'maju_jaya2'
            ]
        ]);
    }
}
