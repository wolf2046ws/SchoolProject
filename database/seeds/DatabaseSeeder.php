<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CompanyDataSeeder::class);
        $this->call(DepartmentDataSeeder::class);
        $this->call(FilesDataSeeder::class);
        $this->call(HardwareDataSeeder::class);
        $this->call(SoftwareDataSeeder::class);
        $this->call(LocationsDataSeeder::class);
        $this->call(ResortDataSeeder::class);



    }
}
