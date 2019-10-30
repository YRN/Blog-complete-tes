<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'address' => 'Yogyakarta, Indonesia',
            'contact_number' => '0274 775027',
            'contact_email' => 'yoanesrn@gdrivepro.com'
        ]); 
    }
}