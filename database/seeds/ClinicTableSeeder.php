<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ClinicTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $clinic=new \App\Clinic();
        $clinic=array(
            ['id'=>1,'name'=>"first",'telephone'=>12345678,'address'=>"mit Ghamr"],
            ['id'=>2,'name'=>"second",'telephone'=>12345678,'address'=>"mansoura"],
            ['id'=>3,'name'=>"third",'telephone'=>12345678,'address'=>"damitta "],
        );

        DB::table('clinics')->insert($clinic);
    }

}