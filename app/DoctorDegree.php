<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDegree extends Model
{
    public function userrole()
    {
        return $this->belongsTo(UserRole::class);
    }
    public $timestamps = false;
}
