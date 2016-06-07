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
            ['id' => 1, 'user_id' => 1, 'clinic_id' => 1, 'reservation_type_id' => 1, 'parent_id' => NULL, 'date' => "2016-06-26", 'appointment' => "03:15:00", 'status' => 2, 'created_at' => "2016-06-05 10:07:32", 'updated_at' => "2016-06-05 10:07:32"],
            ['id' => 2, 'user_id' => 1, 'clinic_id' => 1, 'reservation_type_id' => 2, 'parent_id' => 30, 'date' => "2016-06-12", 'appointment' => "03:00:00", 'status' => 2, 'created_at' => "2016-06-05 15:03:46", 'updated_at' => "2016-06-05 15:03:46"],
        );

        DB::table('reservations')->insert($reservations);
    }

}