<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $table = 'payment';
	public $incrementing = true;
    public $timestamps = true;

    public function proposals()
    {
    return $this->belongsTo(Proposal::class,'proposal_id');
    }
    
    public function cleint()
	{
		return $this->belongsTo(HireManager::class,'hiremanagerl_id');
    }
    public function payment_status()
	{
		return $this->belongsTo(payment_status::class,'status  ');
	}

}
