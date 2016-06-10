<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function secretaries()
    {
        return $this->hasMany(Secertary::class);
    }
    public function workingHours()
    {
        return $this->hasMany(WorkingHours::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public $timestamps = false;
}
