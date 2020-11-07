<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contract
 * 
 * @property int $id
 * @property int $proposal_id
 * @property int $company_id
 * @property int $freelancer_id
 * @property string $start_time
 * @property string $end_time
 * @property int $payment_type_id
 * @property float $payment_amount
 * 
 * @property Company $company
 * @property Freelancer $freelancer
 * @property PaymentType $payment_type
 * @property Proposal $proposal
 *
 * @package App\Models
 */
class Contract extends Model
{
	protected $table = 'contract';
	public $incrementing = true;
	public $timestamps = true;
	protected $casts = [
		'id' => 'int',
		'proposal_id' => 'int',
		'company_id' => 'int',
		'freelancer_id' => 'int',
		'start_time' => 'binary',
		'end_time' => 'binary',
		'payment_type_id' => 'int',
		'payment_amount' => 'float'
	];

	protected $fillable = [
		'proposal_id',
		'company_id',
		'freelancer_id',
		'start_time',
		'end_time',
		'payment_type_id',
		'payment_amount'
	];

	public function company()
	{
		return $this->belongsTo(Company::class,'company_id');
	}
	public function cleint()
	{
		return $this->belongsTo(HireManager::class,'hiremanager_id');
	}

	public function freelancer()
	{
		return $this->belongsTo(Freelancer::class);
	}

	public function payment_type()
	{
		return $this->belongsTo(PaymentType::class);
	}

	public function proposal()
	{
		return $this->belongsTo(Proposal::class,'proposal_id');
	}
}
