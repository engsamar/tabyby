<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerceptionDetail extends Model
{
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function preception()
    {
        return $this->belongsTo(Preception::class);
    }
}
