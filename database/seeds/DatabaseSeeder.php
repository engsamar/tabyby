<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClinicTableSeeder::class);
        $this->call(WorkingHourTableSeeder::class);
        $this->call(ConsistitueTableSeeder::class);
        $this->call(MedicineTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ReserveTypeTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
        $this->call(PrescriptionTableSeeder::class);
        $this->call(PrescriptionDetailTableSeeder::class);
    }
}
