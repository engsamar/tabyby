<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secertary extends Model
{
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function userRole()
    {
        return $this->belongsTo('App\UserRole');
    }
    public $timestamps = false;
}
