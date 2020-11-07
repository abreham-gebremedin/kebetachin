<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpectedDuration
 * 
 * @property int $id
 * @property string $duration_text
 * 
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class ExpectedDuration extends Model
{
	protected $table = 'expected_duration';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'duration_text'
	];

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}
}
