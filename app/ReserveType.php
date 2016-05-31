<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveType extends Model
{
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
