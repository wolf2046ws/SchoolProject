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
            'name' => "Boltenhagen"
        ]);

        DB::table('locations')->insert([
            'name' => "Prerow"
        ]);

        DB::table('locations')->insert([
            'name' => "Tecklenburg"
        ]);

    }
}
