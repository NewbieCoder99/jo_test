<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Vault extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	protected $fillable = [
		'balance',
		'previous_balance'
	];
	/**
	* Attributes to include in the Audit.
	*
	* @var array
	*/
	protected $auditInclude = [
		'balance',
		'previous_balance'
	];

}