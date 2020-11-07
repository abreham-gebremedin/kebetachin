<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Frelance_job_catagory extends Model
{
	//
	public $incrementing = true;
	public $timestamps = true;
 
	public function jobCatagory()
	{
		return $this->belongsTo(JobCatagory::class,'jcid');
	}

}
