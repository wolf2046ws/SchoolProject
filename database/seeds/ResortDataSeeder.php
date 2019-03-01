<?php

use Illuminate\Database\Seeder;

class ResortDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('resorts')->insert([
            'location_id' => "1",
            'company_id' => '1'
        ]);

        DB::table('resorts')->insert([
            'location_id' => "1",
            'company_id' => '2'
        ]);

        DB::table('resorts')->insert([
            'location_id' => "3",
            'company_id' => '1'
        ]);
    }
}
