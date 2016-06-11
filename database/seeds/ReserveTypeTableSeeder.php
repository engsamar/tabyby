<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ReserveTypeTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $reserve_types = new \App\Consistitue();
        $reserve_types = array(
            ['id' => 1, 'type' => 0, 'dependantOn' => 0],
            ['id' => 2, 'type' => 1, 'dependantOn' => 0],
            ['id' => 3, 'type' => 2, 'dependantOn' => 0],
            ['id' => 4, 'type' => 3, 'dependantOn' => 0],
            ['id' => 5, 'type' => 4, 'dependantOn' => 0],
        );
        DB::table('reserve_types')->insert($reserve_types);
    }

}