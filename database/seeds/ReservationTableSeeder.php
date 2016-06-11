<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ReservationTableSeeder extends Seeder
{

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $reservations = new \App\Consistitue();
        $reservations = array(
            ['id' => 1, 'user_id' => 1, 'clinic_id' => 1, 'reservation_type_id' => 1, 'parent_id' => NULL, 'date' => "2016-06-26", 'appointment' => "04:15:00", 'status' => 0],
        );

        DB::table('reservations')->insert($reservations);
    }

}