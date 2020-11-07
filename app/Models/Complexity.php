<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Complexity
 * 
 * @property int $id
 * @property string $complexity_text
 * 
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class Complexity extends Model
{
	protected $guarded = [];

	protected $table = 'complexity';
	public $incrementing = true;
	public $timestamps = true;
	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'complexity_text'
	];

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}
}
