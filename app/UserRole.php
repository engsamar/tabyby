<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function degrees()
    {
        return $this->hasMany(DoctorDegree::class);
    }

    public function secertary()
    {
        return $this->hasOne('App\Secertary');
    }
    public $timestamps = false;
}
