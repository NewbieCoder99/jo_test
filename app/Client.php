<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Client extends Model implements Auditable
{

	use \OwenIt\Auditing\Auditable;

	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'gender',
		'date_of_birth',
		'job',
		'address',
		'city',
		'phone'
	];

	/**
	* Attributes to include in the Audit.
	*
	* @var array
	*/
	protected $auditInclude = [
		'first_name',
		'middle_name',
		'last_name',
		'gender',
		'date_of_birth',
		'job',
		'address',
		'city',
		'phone'
	];

}
