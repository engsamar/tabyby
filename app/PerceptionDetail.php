<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerceptionDetail extends Model
{
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
