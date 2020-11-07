<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $country
 * @property string $region
 * @property string $city
 * @property string $kebele
 * @property string $houseno
 * 
 * @property Collection|Company[] $companies
 * @property Collection|Freelancer[] $freelancers
 * @property Collection|HireManager[] $hire_managers
 *
 * @package App\Models
 */
class Location extends Model
{
	protected $guarded = [];

	protected $table = 'location';
	public $timestamps = true;

	// protected $fillable = [
	// 	'country',
	// 	'region',
	// 	'city',
	// 	'kebele',
	// 	'houseno'
	// ];

	// public function companies()
	// {
	// 	return $this->hasMany(Company::class, 'locationid');
	// }

	public function freelancers()
	{
		return $this->hasMany(Freelancer::class, 'locationid');
	}

	public function hire_managers()
	{
		return $this->hasMany(HireManager::class, 'locationid');
	}
}
