<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TimeRequirement
 * 
 * @property int $id
 * @property string $time_requirement
 * 
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class TimeRequirement extends Model
{
	protected $table = 'time_requirement';
	public $incrementing = true;
	public $timestamps = true;
	protected $fillable = [
		'time_requirement'
	];

	public function jobs()
	{
		return $this->hasMany(Job::class, 'timeid');
	}
}
