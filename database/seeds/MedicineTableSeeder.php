<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class MedicineTableSeeder extends Seeder
{

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $medicines = new \App\Consistitue();
        $medicines = array(
            ['id' => 1, 'name' => "comtrix", 'type' => 0, 'company' => "iti", 'consistitue_id' => 1],
            ['id' => 2, 'name' => "eye fresh", 'type' => 0, 'company' => "itian", 'consistitue_id' => 2],
            ['id' => 3, 'name' => "flourst", 'type' => 3, 'company' => "iti", 'consistitue_id' => 1],
            ['id' => 4, 'name' => "coa", 'type' => 0, 'company' => "iti", 'consistitue_id' => 3],
        );

        DB::table('medicines')->insert($medicines);
    }

}