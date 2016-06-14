<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplainDetail extends Model
{
   public function complain()
    {
        return $this->belongsTo('App\Complain');
    }
    public $timestamps = false;
}
