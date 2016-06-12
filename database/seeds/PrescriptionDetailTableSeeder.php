<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PrescriptionDetailTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $prescription_details = new \App\Consistitue();
        $prescription_details = array(
            ['id' => 1, 'medicine_name' => "comtrix", 'no_times' => 3, 'quantity' => 3, 'duaration' => 3, 'prescription_id' => 1, 'medicine_id' => 1],
        );

        DB::table('prescription_details')->insert($prescription_details);
    }

}