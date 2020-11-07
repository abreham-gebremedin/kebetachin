<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScreninigQuestion
 * 
 * @property int $id
 * @property string $question
 * @property int $jobid
 * 
 * @property Job $job
 * @property Collection|Answer[] $answers
 *
 * @package App\Models
 */
class ScreninigQuestion extends Model
{
	protected $table = 'screninig_question';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'jobid' => 'int'
	];

	protected $fillable = [
		'question',
		'jobid'
	];

	public function job()
	{
		return $this->belongsTo(Job::class, 'jobid');
	}

	public function answers()
	{
		return $this->hasMany(Answer::class, 'questionid');
	}
}
