<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function PrescriptionDetails()
    {
        return $this->hasMany(PrescriptionDetail::class);
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
    public $timestamps = false;
}


