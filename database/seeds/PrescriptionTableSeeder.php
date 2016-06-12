<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PrescriptionTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $prescriptions = new \App\Consistitue();
        $prescriptions = array(
            ['id' => 1, 'reservation_id' => 1],
        );

        DB::table('prescriptions')->insert($prescriptions);
    }

}