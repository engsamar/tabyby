<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secertary extends Model
{
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
