<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string $name
 * @property int $hire_manager_id
 * @property int $expected_duration_id
 * @property int $complexity_id
 * @property string $description
 * @property int $main_skill_id
 * @property int $payment_type_id
 * @property float $payment_amount
 * @property int $timeid
 * @property int $qualificationid
 * @property int $number_of_frelance
 * @property int $attachmentid
 * @property int $job_catagory_id
 * 
 * @property JobCatagory $job_catagory
 * @property Complexity $complexity
 * @property ExpectedDuration $expected_duration
 * @property HireManager $hire_manager
 * @property TimeRequirement $time_requirement
 * @property Qualification $qualification
 * @property Attachment $attachment
 * @property PaymentType $payment_type
 * @property Skill $skill
 * @property Collection|OtherSkill[] $other_skills
 * @property Collection|Proposal[] $proposals
 * @property Collection|ScreninigQuestion[] $screninig_questions
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $guarded = [];
	protected $table = 'job';
	public $incrementing = true;
	public $timestamps = true;
 
	public function job_catagory()
	{
		return $this->belongsTo(JobCatagory::class);
	}

	public function complexity()
	{
		return $this->belongsTo(Complexity::class);
	}

	public function expected_duration()
	{
		return $this->belongsTo(ExpectedDuration::class,'expected_duration_id');
	}

	public function hire_manager()
	{
		return $this->belongsTo(HireManager::class);
	}

	public function time_requirement()
	{
		return $this->belongsTo(TimeRequirement::class, 'timeid');
	}

	public function qualification()
	{
		return $this->belongsTo(Qualification::class, 'qualificationid');
	}

	public function attachment()
	{
		return $this->belongsTo(Attachment::class, 'attachmentid');
	}

	public function payment_type()
	{
		return $this->belongsTo(PaymentType::class);
	}

	public function skill()
	{
		return $this->belongsTo(Skill::class, 'main_skill_id');
	}

	 
	public function other_skills()
	{
 		return $this->belongsToMany(Skill::class);
	}

	public function proposals()
	{
		return $this->hasMany(Proposal::class);
	}

	public function screninig_questions()
	{
		return $this->hasMany(ScreninigQuestion::class, 'jobid');
	}
}
