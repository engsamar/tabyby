<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complainDetail()
    {
        return $this->hasMany(ComplainDetail::class);
    }
    public $timestamps = false;
  
}
