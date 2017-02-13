<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class CompanyDetailsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('company_details')->insert([
            'name' => 'BBFrameworkCo',
            'number_of_employees' => rand(0,300),
            'url' => 'https://bbframework.co',
            'contact_details' => json_encode([
                'phone' => '07792764738',
                'iso_code' => 'GB',
                'email' => 'rclifford@cybershade.org',
                'fax' => '07792764738',
                'extra' => [
                    'some_extra_info' => 'ALL UR BASE R BELONG TO US',
                ],
            ]),
        ]);
    }
}
?>