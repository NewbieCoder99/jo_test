<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	protected $fillable = [
		'client_id',
		'saving_id',
		'balance',
		'previous_balance'
	];
	/**
	* Attributes to include in the Audit.
	*
	* @var array
	*/
	protected $auditInclude = [
		'client_id',
		'saving_id',
		'balance',
		'previous_balance'
	];

}