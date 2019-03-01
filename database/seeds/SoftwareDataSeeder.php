<?php

use Illuminate\Database\Seeder;

class SoftwareDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('software')->insert([
            'name' => "Software A"
        ]);

        DB::table('software')->insert([
            'name' => "Software B"
        ]);

        DB::table('software')->insert([
            'name' => "Software C"
        ]);
    }
}
