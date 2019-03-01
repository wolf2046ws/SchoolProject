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
            'name' => "Company A"
        ]);

        DB::table('companies')->insert([
            'name' => "Company B"
        ]);

        DB::table('companies')->insert([
            'name' => "Company C"
        ]);
    }
}
