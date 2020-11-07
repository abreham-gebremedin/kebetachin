<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attachment
 * 
 * @property int $id
 * @property int $message_id
 * @property string $attachment_link
 * 
 * @property Message $message
 * @property Collection|Education[] $education
 * @property Collection|Job[] $jobs
 *
 * @package App\Models
 */
class Attachment extends Model
{
	protected $table = 'attachment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'message_id' => 'int'
	];

	protected $fillable = [
		'message_id',
		'attachment_link'
	];

	public function message()
	{
		return $this->belongsTo(Message::class);
	}

	public function education()
	{
		return $this->hasMany(Education::class, 'attachmentid');
	}

	public function jobs()
	{
		return $this->hasMany(Job::class, 'attachmentid');
	}
}
