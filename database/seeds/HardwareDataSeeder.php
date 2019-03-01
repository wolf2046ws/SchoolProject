<?php

use Illuminate\Database\Seeder;

class HardwareDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hardware')->insert([
            'name' => "Hardware A"
        ]);

        DB::table('hardware')->insert([
            'name' => "Hardware B"
        ]);

        DB::table('hardware')->insert([
            'name' => "Hardware C"
        ]);
    }
}
