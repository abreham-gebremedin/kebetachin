<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobCatagory
 * 
 * @property int $id
 * @property string $catagory_name
 * 
 * @property Collection|Job[] $jobs
 * @property Collection|Skill[] $skills
 *
 * @package App\Models
 */
class JobCatagory extends Model
{
	protected $guarded = [];
	protected $table = 'job_catagory';
	public $timestamps = true;

	protected $fillable = [
		'catagory_name'
	];

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}

	public function skills()
	{
		return $this->hasMany(Skill::class, 'job_catid');
	}
	 
}
