<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OtherSkill
 * 
 * @property int $id
 * @property int $job_id
 * @property int $skill_id
 * 
 * @property Job $job
 * @property Skill $skill
 *
 * @package App\Models
 */
class OtherSkill extends Model
{
	protected $table = 'job_skill';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'job_id' => 'int',
		'skill_id' => 'int'
	];

	protected $fillable = [
		'job_id',
		'skill_id'
	];

	public function job()
	{
		return $this->belongsTo(Job::class);
	}

	public function skill()
	{
		return $this->belongsTo(Skill::class);
	}
}
