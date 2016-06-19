<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function medicalHistoryDetail()
    {
        return $this->hasOne(MedicalHistoryDetail::class);
    }
   /* public function medicalhistory()
    {
        return $this->belongsTo(MedicalHistoryDetail::class);
    }*/
    public $timestamps = false;
}
