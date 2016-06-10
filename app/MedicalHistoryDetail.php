<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistoryDetail extends Model
{
	public function medicalhistory()
    {
        return $this->belongsTo(MedicalHistory::class);
    }
    public $timestamps = false;
}
