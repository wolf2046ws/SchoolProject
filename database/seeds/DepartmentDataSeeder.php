<?php

use Illuminate\Database\Seeder;

class DepartmentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            'name' => "Department A"
        ]);

        DB::table('departments')->insert([
            'name' => "Department B"
        ]);

        DB::table('departments')->insert([
            'name' => "Department C"
        ]);
    }
}
