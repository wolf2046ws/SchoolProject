<?php

use Illuminate\Database\Seeder;

class LocationsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('locations')->insert([
            'name' => "Location A"
        ]);

        DB::table('locations')->insert([
            'name' => "Location B"
        ]);

        DB::table('locations')->insert([
            'name' => "Location C"
        ]);

    }
}
