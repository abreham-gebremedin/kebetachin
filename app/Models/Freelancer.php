<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Freelancer
 * 
 * @property int $id
 * @property int $user_account_id
 * @property Carbon $registration_date
 * @property string $overview
 * @property int $locationid
 * 
 * @property Location $location
 * @property Collection|Answer[] $answers
 * @property Collection|Contract[] $contracts
 * @property Collection|Education[] $education
 * @property Collection|HasSkill[] $has_skills
 * @property Collection|Message[] $messages
 * @property Collection|Proposal[] $proposals
 *
 * @package App\Models
 */
class Freelancer extends Model
{
	protected $guarded = [];
	protected $table = 'freelancer';
	public $incrementing = true;
	public $timestamps = true;

 
	public function location()
	{
		return $this->belongsTo(Location::class, 'lid');
	}
	

	public function answers()
	{
		return $this->hasMany(Answer::class);
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}

	public function education()
	{
		return $this->hasMany(Education::class);
	}

	public function has_skills()
	{
		return $this->hasMany(HasSkill::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	public function proposals()
	{
		return $this->hasMany(Proposal::class);
	}


	public function Frelance_job_catagory()
    {
		return $this->hasMany(Frelance_job_catagory::class,'fid');

 	}
	public function user()
	{
		return $this->belongsTo(User::class,'userid');
	}
	public function payment_type()
	{
		return $this->belongsTo(PaymentType::class, 'payment_type_id');
	}
}
