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
            'name' => "PC",
            'model' => "Toshiba 520TM",
            'serial_number' => "83056246",
            'asset_id' => "000045"
        ]);

        DB::table('hardware')->insert([
            'name' => "Monitor",
            'model' => "Pansonic 220/240 LCD",
            'serial_number' => "54692562",
            'asset_id' => "000012"
        ]);

        DB::table('hardware')->insert([
            'name' => "Mouse",
            'model' => "LG 496-Speed",
            'serial_number' => "3254914",
            'asset_id' => "000013"
        ]);

        DB::table('hardware')->insert([
            'name' => "Laptop",
            'model' => "MAC Book Air",
            'serial_number' => "756478",
            'asset_id' => "000068"
        ]);

    }
}
