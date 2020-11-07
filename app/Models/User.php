<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $last_name
 * @property string $photo
 * @property Carbon $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool $is_admin
 * @property string $remember_token
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $incrementing = true;
	public $timestamps = true;
	protected $casts = [
		'is_admin' => 'bool'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'user_name',
		'password',
		'email',
		'name',
		'last_name',
		'photo',
		'email_verified_at',
		'is_admin',
		'remember_token'
	];

	public function AuthRouteAPI(Request $request)
	{
		return $request->user();
	}
}
