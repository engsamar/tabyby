<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ConsistitueTableSeeder extends Seeder
{

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');


        $consistitues = new \App\Consistitue();
        $consistitues = array(
            ['id' => 1, 'active_consistitue' => "first"],
            ['id' => 2, 'active_consistitue' => "second"],
            ['id' => 3, 'active_consistitue' => "third"],
        );

        DB::table('consistitues')->insert($consistitues);
    }

}