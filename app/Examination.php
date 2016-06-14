<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
    public $timestamps = false;
}
