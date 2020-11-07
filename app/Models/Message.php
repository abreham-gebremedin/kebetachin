<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $id
 * @property int $freelancer_id
 * @property int $hire_manager_id
 * @property string $message_time
 * @property string $message_text
 * @property int $proposal_id
 * @property int $proposal_status_catalog_id
 * 
 * @property Freelancer $freelancer
 * @property HireManager $hire_manager
 * @property Proposal $proposal
 * @property ProposalStatusCatalog $proposal_status_catalog
 * @property Collection|Attachment[] $attachments
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'message';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'freelancer_id' => 'int',
		'hire_manager_id' => 'int',
		'message_time' => 'binary',
		'proposal_id' => 'int',
		'proposal_status_catalog_id' => 'int'
	];

	protected $fillable = [
		'freelancer_id',
		'hire_manager_id',
		'message_time',
		'message_text',
		'proposal_id',
		'proposal_status_catalog_id'
	];
	 
	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class);
	}

	public function hire_manager()
	{
		return $this->belongsTo(HireManager::class);
	}

	public function proposal()
	{
		return $this->belongsTo(Proposal::class);
	}

	public function proposal_status_catalog()
	{
		return $this->belongsTo(ProposalStatusCatalog::class);
	}

	public function attachments()
	{
		return $this->hasMany(Attachment::class);
	}
	public function cleint()
	{
		return $this->belongsTo(HireManager::class,'hire_manager_id');
	}
}
