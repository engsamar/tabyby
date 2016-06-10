<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function preceptionDetails()
    {
        return $this->hasMany(PreceptionDetail::class);
    }

    public function constituent()
    {
        return $this->hasMany(Consistitue::class);
    }
    public $timestamps = false;
}
