<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Qualification
 * 
 * @property int $id
 * @property int $name
 * 
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class Qualification extends Model
{
	protected $table = 'qualification';
	public $timestamps = true;

	protected $casts = [
		'name' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function jobs()
	{
		return $this->hasMany(Job::class, 'qualificationid');
	}
}
