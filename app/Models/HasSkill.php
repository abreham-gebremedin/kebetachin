<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HasSkill
 * 
 * @property int $id
 * @property int $freelancer_id
 * @property int $skill_id
 * 
 * @property Freelancer $freelancer
 * @property Skill $skill
 *
 * @package App\Models
 */
class HasSkill extends Model
{
	protected $guarded = [];

	protected $table = 'has_skill';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'freelancer_id' => 'int',
		'skill_id' => 'int'
	];

	protected $fillable = [
		'freelancer_id',
		'skill_id'
	];

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class);
	}

	public function skill()
	{
		return $this->belongsTo(Skill::class);
	}
}
