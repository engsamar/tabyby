<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function PrescriptionDetails()
    {
        return $this->hasMany(PrescriptionDetail::class);
    }
}
