<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * 
 * @property int $id
 * @property string $skill_name
 * @property int $job_catid
 * 
 * @property JobCatagory $job_catagory
 * @property Collection|HasSkill[] $has_skills
 * @property Collection|Job[] $jobs
 * @property Collection|OtherSkill[] $other_skills
 *
 * @package App\Models
 */
class Skill extends Model
{
	protected $table = 'skill';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'job_catid' => 'int'
	];

	protected $fillable = [
		'skill_name',
		'job_catid'
	];

	public function job_catagory()
	{
		return $this->belongsTo(JobCatagory::class, 'job_catid');
	}

	public function has_skills()
	{
		return $this->hasMany(HasSkill::class);
	}

	public function jobs()
	{
		return $this->hasMany(Job::class, 'main_skill_id');
	}

	public function other_skills()
	{
		return $this->hasMany(OtherSkill::class);
	}
	
	public function other_jobs()
	{
		return $this->belongsToMany(Job::class) ;
	}


}
