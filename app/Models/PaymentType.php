<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentType
 * 
 * @property int $id
 * @property string $type_name
 * 
 * @property Collection|Contract[] $contracts
 * @property Collection|Job[] $jobs
 * @property Collection|Proposal[] $proposals
 *
 * @package App\Models
 */
class PaymentType extends Model
{
	protected $table = 'payment_type';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'type_name'
	];

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}
	public function freelancer()
	{
		return $this->hasMany(Freelancer::class);
	}

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}

	public function proposals()
	{
		return $this->hasMany(Proposal::class);
	}
}
