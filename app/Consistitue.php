<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consistitue extends Model
{
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
