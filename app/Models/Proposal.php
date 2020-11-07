<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proposal
 * 
 * @property int $id
 * @property int $job_id
 * @property int $freelancer_id
 * @property string $proposal_time
 * @property int $payment_type_id
 * @property float $payment_amount
 * @property int $current_proposal_status
 * @property int $client_grade
 * @property string $client_comment
 * @property int $freelancer_grade
 * @property string $freelancer_comment
 * 
 * @property Freelancer $freelancer
 * @property Job $job
 * @property PaymentType $payment_type
 * @property ProposalStatusCatalog $proposal_status_catalog
 * @property Collection|Contract[] $contracts
 * @property Collection|Message[] $messages
 *
 * @package App\Models
 */
class Proposal extends Model
{
	protected $table = 'proposal';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int',
		'job_id' => 'int',
		'freelancer_id' => 'int',
		'proposal_time' => 'binary',
		'payment_type_id' => 'int',
		'payment_amount' => 'float',
		'current_proposal_status' => 'int',
		'client_grade' => 'int',
		'freelancer_grade' => 'int'
	];

	protected $fillable = [
		'job_id',
		'freelancer_id',
		'proposal_time',
		'payment_type_id',
		'payment_amount',
		'current_proposal_status',
		'client_grade',
		'client_comment',
		'freelancer_grade',
		'freelancer_comment'
	];

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class,'freelancer_id');
	}

	public function job()
	{
		return $this->belongsTo(Job::class,"job_id");
	}

	public function payment_type()
	{
		return $this->belongsTo(PaymentType::class);
	}

	public function proposal_status_catalog()
	{
		return $this->belongsTo(ProposalStatusCatalog::class, 'current_proposal_status');
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}
}
