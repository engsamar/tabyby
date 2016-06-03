<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class WorkingHourTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $working_hours=new \App\WorkingHour();
        $working_hours=array(
            ['id'=>1,'fromTime'=>4,'toTime'=>6,'address'=>"mit Ghamr"],
            ['id'=>2,'fromTime'=>5,'toTime'=>7,'address'=>"mansoura"],
            ['id'=>3,'fromTime'=>6,'toTime'=>8,'address'=>"damitta "],
        );

        DB::table('working_hours')->insert($working_hours);
    }

}