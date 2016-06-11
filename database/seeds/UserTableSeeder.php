<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $users = new \App\Consistitue();
        $users = array(
            ['id' => 1, 'username' => "mostafa", 'email' => "mostafaelsharkawy87@yahoo.com", 'address' => "mit ghamr", 'telephone' => 12345678, 'mobile' => "01125840548", 'password' => '$2y$10$Pmio5poyoH6WS/nIXF6YoObzfGvJDMUzXwkC7c7byYCi5jSynZ7Ri', 'birthdate' => 2016 - 06 - 07, 'remember_token' => NULL],
        );

        DB::table('users')->insert($users);
    }

}