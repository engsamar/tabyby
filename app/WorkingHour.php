<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public $timestamps = false;
}


