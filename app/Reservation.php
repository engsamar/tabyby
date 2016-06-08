<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   /* public function reservationType()
    {
        return $this->belongsTo(ReserveType::class);
    }*/

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complain()
    {
        return $this->hasOne('App\Complain');
    }

    public function examination()
    {
        return $this->hasOne('App\Examination');
    }
}
