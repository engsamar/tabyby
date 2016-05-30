<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreceptionDetail extends Model
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
