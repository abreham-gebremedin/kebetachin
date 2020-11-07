<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property int $id
 * @property int $freelancer_id
 * @property int $questionid
 * 
 * @property ScreninigQuestion $screninig_question
 * @property Freelancer $freelancer
 *
 * @package App\Models
 */
class Answer extends Model
{
	protected $table = 'answer';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'freelancer_id' => 'int',
		'questionid' => 'int'
	];

	protected $fillable = [
		'freelancer_id',
		'questionid'
	];

	public function screninig_question()
	{
		return $this->belongsTo(ScreninigQuestion::class, 'questionid');
	}

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class);
	}
}
