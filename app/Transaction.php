<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Transaction extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	protected $fillable = [
		'user_id',
		'client_id',
		'client_transaction_type_id',
		'user_transaction_type_id',
		'client_transaction_description',
		'user_transaction_description',
		'amount',
		'created_at'
	];

	/**
	* Attributes to include in the Audit.
	*
	* @var array
	*/
	protected $auditInclude = [
		'user_id',
		'client_id',
		'client_transaction_type_id',
		'user_transaction_type_id',
		'client_transaction_description',
		'user_transaction_description',
		'amount',
	];
}
