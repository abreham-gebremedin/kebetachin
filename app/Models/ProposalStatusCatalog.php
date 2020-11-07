<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProposalStatusCatalog
 * 
 * @property int $id
 * @property string $status_name
 * 
 * @property Collection|Message[] $messages
 * @property Collection|Proposal[] $proposals
 *
 * @package App\Models
 */
class ProposalStatusCatalog extends Model
{
	protected $table = 'proposal_status_catalog';
	public $incrementing = true;
	public $timestamps = true;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'status_name'
	];

	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	public function proposals()
	{
		return $this->hasMany(Proposal::class, 'current_proposal_status');
	}
}
