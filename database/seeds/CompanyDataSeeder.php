<?php

use Illuminate\Database\Seeder;

class CompanyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'name' => "Regenbogen AG"
        ]);

        DB::table('companies')->insert([
            'name' => "Vosshall Marketing"
        ]);

        DB::table('companies')->insert([
            'name' => "Tourist Concept"
        ]);
    }
}
