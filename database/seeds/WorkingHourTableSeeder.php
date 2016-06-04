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
            ['id'=>1,'fromTime'=>4,'toTime'=>6,'day'=>"2016-06-10",'clinic_id'=>1,'status'=>1],
            ['id'=>2,'fromTime'=>5,'toTime'=>7,'day'=>"2016-06-11",'clinic_id'=>1,'status'=>1],
            ['id'=>3,'fromTime'=>6,'toTime'=>8,'day'=>"2016-06-12",'clinic_id'=>2,'status'=>0],
        );

        DB::table('working_hours')->insert($working_hours);
    }

}