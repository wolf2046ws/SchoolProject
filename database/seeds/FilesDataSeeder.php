<?php

use Illuminate\Database\Seeder;

class FilesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('access_files')->insert([
            'name' => "Access  FIle A"
        ]);

        DB::table('access_files')->insert([
            'name' => "Access  FIle B"
        ]);
        
        DB::table('access_files')->insert([
            'name' => "Access  FIle C"
        ]);
    }
}
