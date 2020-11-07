<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $company_name
 * @property int $locationid
 * 
 * @property Location $location
 * @property Collection|Contract[] $contracts
 * @property Collection|HireManager[] $hire_managers
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $guarded = [];

	protected $table = 'company';
	public $incrementing = true;
	public $timestamps = true;
	public function location()
	{
		return $this->belongsTo(Location::class, 'locationid');
	}

	public function contracts()
	{
		return $this->hasMany(Contract::class);
	}

	public function hire_managers()
	{
		return $this->hasMany(HireManager::class);
	}
}
