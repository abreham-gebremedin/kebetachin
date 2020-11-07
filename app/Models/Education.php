<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 * 
 * @property int $id
 * @property int $freelancer_id
 * @property string $certification_name
 * @property string $provider
 * @property string $description
 * @property Carbon $date_earned
 * @property string $certification_link
 * @property int $attachmentid
 * 
 * @property Freelancer $freelancer
 * @property Attachment $attachment
 *
 * @package App\Models
 */
class Education extends Model
{
	protected $table = 'education';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'freelancer_id' => 'int',
		'attachmentid' => 'int'
	];

	protected $dates = [
		'date_earned'
	];

	protected $fillable = [
		'freelancer_id',
		'certification_name',
		'provider',
		'description',
		'date_earned',
		'certification_link',
		'attachmentid'
	];

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class);
	}

	public function attachment()
	{
		return $this->belongsTo(Attachment::class, 'attachmentid');
	}
}
