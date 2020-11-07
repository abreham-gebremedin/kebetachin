<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HireManager
 * 
 * @property int $id
 * @property int $user_account_id
 * @property Carbon $registration_date
 * @property int $locationid
 * @property int $company_id
 * 
 * @property Company $company
 * @property Location $location
 * @property Collection|Job[] $jobs
 * @property Collection|Message[] $messages
 *
 * @package App\Models
 */
class HireManager extends Model
{
	protected $table = 'hire_manager';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'user_account_id' => 'int',
		'locationid' => 'int',
		'company_id' => 'int'
	];

	protected $dates = [
		'registration_date'
	];

	protected $fillable = [
		'user_account_id',
		'registration_date',
		'locationid',
		'company_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function location()
	{
		return $this->belongsTo(Location::class, 'locationid');
	}

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class,'user_account_id');
	}
}
