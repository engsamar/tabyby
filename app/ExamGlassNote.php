<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGlassNote extends Model
{

	public function glassExam()
	{
		return $this->belongsTo('App\ExamGlass');

	}
    public $timestamps = false;
}
