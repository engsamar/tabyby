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
            ['id'=>1,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"monday",'clinic_id'=>1],
            ['id'=>2,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"saturday",'clinic_id'=>1],
            ['id'=>3,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"sunday",'clinic_id'=>1],
            ['id'=>4,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"tuesday",'clinic_id'=>1],
            ['id'=>5,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"wednesday",'clinic_id'=>1],
            ['id'=>6,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"thursday",'clinic_id'=>1],
            ['id'=>7,'fromTime'=>"16:00:00",'toTime'=>"17:00:00",'day'=>"friday",'clinic_id'=>1],
        );
        DB::table('working_hours')->insert($working_hours);
    }

}